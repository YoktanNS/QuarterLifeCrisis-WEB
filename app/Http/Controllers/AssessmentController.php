<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SymptomCategory;
use App\Models\Assessment;
use App\Models\AssessmentAnswer;
use App\Models\AssessmentResult;
use App\Models\RecommendationResult;
use App\Services\ForwardChainingService;
use App\Services\SawMethodService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    // Menampilkan halaman form kuesioner tes QLC
    public function index()
    {
        // Mengambil semua gejala beserta kategorinya untuk ditampilkan di form
        $categories = SymptomCategory::with('symptoms')->get();
        return view('assessment.index', compact('categories'));
    }

    // Memproses form yang di-submit pengguna
    public function store(Request $request, ForwardChainingService $fcService, SawMethodService $sawService)
    {
        // Validasi: pastikan user minimal memilih 1 gejala
        $request->validate([
            'symptoms' => 'required|array|min:1',
            'symptoms.*' => 'exists:symptoms,id'
        ], [
            'symptoms.required' => 'Anda harus memilih setidaknya satu pernyataan yang sesuai dengan kondisi Anda.'
        ]);

        $selectedSymptomIds = $request->symptoms;

        // Gunakan DB Transaction agar jika terjadi error di tengah jalan, database tidak setengah-setengah tersimpan
        try {
            DB::beginTransaction();

            // 1. Buat Header Riwayat Tes (Asumsi user sudah login)
            // Jika sistemmu bisa diakses tanpa login (Guest), bagian user_id bisa disesuaikan nanti
            $assessment = Assessment::create([
                'user_id' => Auth::id() ?? 1, // Sementara pakai ID 1 jika belum buat fitur login
            ]);

            // 2. Simpan Detail Jawaban (Gejala yang dipilih)
            foreach ($selectedSymptomIds as $symptomId) {
                AssessmentAnswer::create([
                    'assessment_id' => $assessment->id,
                    'symptom_id' => $symptomId
                ]);
            }

            // 3. Panggil Otak 1: Forward Chaining untuk deteksi tingkat krisis
            $qlcLevel = $fcService->detectLevel($selectedSymptomIds);

            // Simpan hasil deteksi
            AssessmentResult::create([
                'assessment_id' => $assessment->id,
                'qlc_level_id' => $qlcLevel->id
            ]);

            // 4. Panggil Otak 2: SAW untuk rekomendasi (Hanya jika bukan level Berat/L03)
            if ($qlcLevel->code !== 'L03') {
                $recommendations = $sawService->calculate($qlcLevel->id);

                // Simpan hasil perankingan (Action Plans)
                $rank = 1;
                foreach ($recommendations as $rec) {
                    RecommendationResult::create([
                        'assessment_id' => $assessment->id,
                        'action_plan_id' => $rec['action_plan']->id,
                        'saw_score' => $rec['saw_score'],
                        'rank' => $rank
                    ]);
                    $rank++;
                }
            }

            DB::commit();

            // Redirect ke halaman hasil tes dengan membawa ID assessment
            return redirect()->route('assessment.result', $assessment->id)
                             ->with('success', 'Tes berhasil diselesaikan!');

        } catch (\Exception $e) {
            DB::rollBack();
            // Jika error, kembalikan ke form dengan pesan error
            return back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    // Menampilkan halaman hasil tes berdasarkan ID
    public function showResult($id)
    {
        $assessment = Assessment::with([
            'answers.symptom',
            'result.qlcLevel',
            'recommendations.actionPlan' => function($query) {
                $query->orderBy('rank', 'asc'); // Urutkan dari ranking 1
            }
        ])->findOrFail($id);

        return view('assessment.result', compact('assessment'));
    }
}
