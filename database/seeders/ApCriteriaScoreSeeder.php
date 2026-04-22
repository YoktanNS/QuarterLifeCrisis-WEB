<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ApCriteriaScore;

class ApCriteriaScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Urutan Kriteria: 1(C01), 2(C02), 3(C03), 4(C04)
        // Urutan Action Plan: 1(AP01) sd 5(AP05)
        
        $scores = [
            // AP01: Journaling (Efektivitas: 7, Mudah: 9, Waktu(Cost): 3, Upaya(Cost): 2)
            ['action_plan_id' => 1, 'criterion_id' => 1, 'score' => 7],
            ['action_plan_id' => 1, 'criterion_id' => 2, 'score' => 9],
            ['action_plan_id' => 1, 'criterion_id' => 3, 'score' => 3],
            ['action_plan_id' => 1, 'criterion_id' => 4, 'score' => 2],

            // AP02: Eksplorasi Minat (Efektivitas: 8, Mudah: 7, Waktu(Cost): 6, Upaya(Cost): 5)
            ['action_plan_id' => 2, 'criterion_id' => 1, 'score' => 8],
            ['action_plan_id' => 2, 'criterion_id' => 2, 'score' => 7],
            ['action_plan_id' => 2, 'criterion_id' => 3, 'score' => 6],
            ['action_plan_id' => 2, 'criterion_id' => 4, 'score' => 5],

            // AP03: Mentoring (Efektivitas: 9, Mudah: 5, Waktu(Cost): 7, Upaya(Cost): 6)
            ['action_plan_id' => 3, 'criterion_id' => 1, 'score' => 9],
            ['action_plan_id' => 3, 'criterion_id' => 2, 'score' => 5],
            ['action_plan_id' => 3, 'criterion_id' => 3, 'score' => 7],
            ['action_plan_id' => 3, 'criterion_id' => 4, 'score' => 6],
            
            // AP04: Meditasi (Efektivitas: 8, Mudah: 8, Waktu(Cost): 4, Upaya(Cost): 3)
            ['action_plan_id' => 4, 'criterion_id' => 1, 'score' => 8],
            ['action_plan_id' => 4, 'criterion_id' => 2, 'score' => 8],
            ['action_plan_id' => 4, 'criterion_id' => 3, 'score' => 4],
            ['action_plan_id' => 4, 'criterion_id' => 4, 'score' => 3],

            // AP05: Finansial (Efektivitas: 8, Mudah: 6, Waktu(Cost): 5, Upaya(Cost): 7)
            ['action_plan_id' => 5, 'criterion_id' => 1, 'score' => 8],
            ['action_plan_id' => 5, 'criterion_id' => 2, 'score' => 6],
            ['action_plan_id' => 5, 'criterion_id' => 3, 'score' => 5],
            ['action_plan_id' => 5, 'criterion_id' => 4, 'score' => 7],
        ];

        foreach ($scores as $score) {
            ApCriteriaScore::create($score);
        }
    }
}
