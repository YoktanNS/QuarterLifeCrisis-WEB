<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QlcLevel;

class QlcLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'code' => 'L01', 
                'name' => 'Ringan', 
                'description' => 'Mengalami kebingungan awal terkait arah hidup dan karir, namun masih dapat berfungsi normal dalam aktivitas sehari-hari.',
                'referral_message' => null
            ],
            [
                'code' => 'L02', 
                'name' => 'Sedang', 
                'description' => 'Gejala krisis mulai mengganggu produktivitas dan kesejahteraan emosional. Membutuhkan intervensi dan action plan mandiri yang terstruktur.',
                'referral_message' => null
            ],
            [
                'code' => 'L03', 
                'name' => 'Berat', 
                'description' => 'Distress psikologis yang signifikan, putus asa, dan berpotensi mengarah pada gangguan kecemasan klinis kronis.',
                'referral_message' => 'Sistem mendeteksi tingkat Quarter-Life Crisis yang Anda alami berada pada tahap Berat. Demi kebaikan dan kesehatan mental Anda, kami sangat menyarankan untuk segera menjadwalkan sesi konsultasi dengan Psikolog profesional. Sistem ini tidak memberikan rekomendasi tindakan mandiri untuk tingkat ini.'
            ],
        ];

        foreach ($levels as $level) {
            QlcLevel::create($level);
        }
    }
}
