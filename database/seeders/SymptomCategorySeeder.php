<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SymptomCategory;

class SymptomCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Kebingungan Identitas Diri', 'description' => 'Mewakili DCQ-12 Subscale Disconnection & Distress + Atwood & Scholtz (2008)'],
            ['name' => 'Krisis Karir & Tujuan Hidup', 'description' => 'Mewakili DCQ-12 Subscale Lack of Clarity & Control + Robbins & Wilner (2001)'],
            ['name' => 'Tekanan Finansial & Kemandirian', 'description' => 'Mewakili Atwood & Scholtz (2008) + Studi Indonesia 2022–2024'],
            ['name' => 'Tekanan Sosial & Hubungan', 'description' => 'Mewakili Faktor Budaya Kolektif Indonesia + Atwood & Scholtz (2008)'],
            ['name' => 'Distress Psikologis & Eksistensial', 'description' => 'Mewakili DCQ-12 Subscale Disconnection & Distress — Gejala Paling Kritis'],
        ];

        foreach ($categories as $category) {
            SymptomCategory::create($category);
        }
    }
}
