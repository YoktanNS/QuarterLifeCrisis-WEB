<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FcRule;

class FcRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asumsi Logika Dasar: 
        // G01 - G07 cenderung ke Ringan (L01)
        // G08 - G16 cenderung ke Sedang (L02)
        // G17 - G20 cenderung ke Berat (L03)
        
        $rules = [];
        
        for ($i = 1; $i <= 7; $i++) {
            $rules[] = ['qlc_level_id' => 1, 'symptom_id' => $i];
        }
        for ($i = 8; $i <= 16; $i++) {
            $rules[] = ['qlc_level_id' => 2, 'symptom_id' => $i];
        }
        for ($i = 17; $i <= 20; $i++) {
            $rules[] = ['qlc_level_id' => 3, 'symptom_id' => $i];
        }

        foreach ($rules as $rule) {
            FcRule::create($rule);
        }
    }
}
