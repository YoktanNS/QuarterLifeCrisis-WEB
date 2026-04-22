<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActionPlan;

class ActionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            // Solusi untuk Tingkat Ringan (Level 1)
            ['code' => 'AP01', 'name' => 'Self-Reflection Journaling', 'description' => 'Menulis jurnal harian untuk memetakan emosi dan kebingungan yang sedang dirasakan.', 'qlc_level_id' => 1],
            ['code' => 'AP02', 'name' => 'Eksplorasi Minat Ringan', 'description' => 'Mencoba 1-2 kegiatan atau kelas gratis baru setiap bulan tanpa tekanan hasil akhir.', 'qlc_level_id' => 1],
            
            // Solusi untuk Tingkat Sedang (Level 2)
            ['code' => 'AP03', 'name' => 'Mentoring Karir Profesional', 'description' => 'Mencari mentor atau senior di bidang terkait untuk berdiskusi objektif tentang arah karir.', 'qlc_level_id' => 2],
            ['code' => 'AP04', 'name' => 'Mindfulness & Meditasi Rutin', 'description' => 'Melakukan latihan pernapasan dan kesadaran diri secara rutin untuk meredakan kecemasan.', 'qlc_level_id' => 2],
            ['code' => 'AP05', 'name' => 'Financial Detox & Budgeting', 'description' => 'Mengevaluasi pengeluaran secara ketat dan menyusun rencana keuangan dasar 3 bulan ke depan.', 'qlc_level_id' => 2],
        ];

        foreach ($plans as $plan) {
            ActionPlan::create($plan);
        }
    }
}
