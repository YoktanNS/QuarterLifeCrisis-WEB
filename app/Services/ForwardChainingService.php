<?php

namespace App\Services;

use App\Models\FcRule;
use App\Models\QlcLevel;

class ForwardChainingService
{
    /**
     * Mengevaluasi level QLC berdasarkan array ID gejala yang dipilih user
     */
    public function detectLevel(array $selectedSymptomIds)
    {
        // 1. Ambil semua aturan yang cocok dengan gejala yang dipilih
        $matchedRules = FcRule::whereIn('symptom_id', $selectedSymptomIds)->get();

        // 2. Jika tidak ada gejala yang dipilih/cocok, kembalikan level Ringan sebagai default
        if ($matchedRules->isEmpty()) {
            return QlcLevel::where('code', 'L01')->first();
        }

        // 3. Hitung jumlah 'hits' (kecocokan) untuk masing-masing Level QLC
        $levelCounts = $matchedRules->groupBy('qlc_level_id')->map->count();

        // 4. Cari Level ID dengan jumlah hits terbanyak
        // Jika seri (jumlah hits sama), kita urutkan key (level_id) secara descending 
        // agar memprioritaskan level yang lebih berat (misal ID 3 kalahkan ID 2) demi kehati-hatian.
        $resultLevelId = $levelCounts->sortKeysDesc()
                                     ->sortByDesc(function ($count) {
                                         return $count;
                                     })->keys()->first();

        // 5. Kembalikan objek Level QLC yang terpilih
        return QlcLevel::find($resultLevelId);
    }
}