<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Criterion;

class CriterionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria = [
            ['code' => 'C01', 'name' => 'Tingkat Efektivitas', 'type' => 'benefit', 'weight' => 0.40],
            ['code' => 'C02', 'name' => 'Kemudahan Implementasi', 'type' => 'benefit', 'weight' => 0.30],
            ['code' => 'C03', 'name' => 'Kebutuhan Waktu', 'type' => 'cost', 'weight' => 0.15],
            ['code' => 'C04', 'name' => 'Upaya Mental / Biaya', 'type' => 'cost', 'weight' => 0.15],
        ];

        foreach ($criteria as $criterion) {
            Criterion::create($criterion);
        }
    }
}
