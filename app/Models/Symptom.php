<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $guarded = ['id'];

    // Gejala ini milik satu kategori
    public function category()
    {
        return $this->belongsTo(SymptomCategory::class, 'category_id');
    }
}
