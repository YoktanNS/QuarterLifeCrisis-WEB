<?php

namespace App\Services;

use App\Models\ActionPlan;
use App\Models\Criterion;

class SawMethodService
{
    /**
     * Menghitung ranking Action Plan berdasarkan Level QLC pengguna
     */
    public function calculate(int $qlcLevelId)
    {
        // 1. Ambil Action Plan yang sesuai dengan Level QLC user
        $actionPlans = ActionPlan::where('qlc_level_id', $qlcLevelId)
                                 ->with('criteriaScores')
                                 ->get();

        // Jika tidak ada action plan (misal untuk Level 3 / Berat), kembalikan array kosong
        if ($actionPlans->isEmpty()) {
            return [];
        }

        $criteria = Criterion::all();
        $minMaxValues = [];

        // 2. Tahap Mencari Nilai Min dan Max untuk setiap Kriteria (Membentuk Matriks Keputusan)
        foreach ($criteria as $criterion) {
            $scores = $actionPlans->pluck('criteriaScores')
                                  ->flatten()
                                  ->where('criterion_id', $criterion->id)
                                  ->pluck('score');

            $minMaxValues[$criterion->id] = [
                'min' => $scores->min(),
                'max' => $scores->max()
            ];
        }

        // 3. Tahap Normalisasi Matriks (R) dan Perhitungan Nilai Preferensi (V)
        $rankingResults = [];

        foreach ($actionPlans as $plan) {
            $totalSawScore = 0;

            foreach ($criteria as $criterion) {
                // Ambil nilai X asli dari database
                $scoreObj = $plan->criteriaScores->where('criterion_id', $criterion->id)->first();
                $x = $scoreObj ? $scoreObj->score : 0;
                $w = $criterion->weight;

                // Proses Normalisasi berdasarkan sifat Kriteria
                if ($criterion->type === 'benefit') {
                    // Rumus Benefit: R = X / Max
                    $r = $x / $minMaxValues[$criterion->id]['max'];
                } else {
                    // Rumus Cost: R = Min / X
                    // Cegah pembagian dengan nol
                    $r = ($x > 0) ? ($minMaxValues[$criterion->id]['min'] / $x) : 0;
                }

                // Hitung Nilai Preferensi: V = Jumlah (W * R)
                $totalSawScore += ($w * $r);
            }

            // Simpan hasil untuk Action Plan ini
            $rankingResults[] = [
                'action_plan' => $plan,
                'saw_score' => round($totalSawScore, 4) // Bulatkan 4 angka di belakang koma
            ];
        }

        // 4. Urutkan hasil dari skor tertinggi ke terendah
        usort($rankingResults, function ($a, $b) {
            return $b['saw_score'] <=> $a['saw_score'];
        });

        return $rankingResults;
    }
}