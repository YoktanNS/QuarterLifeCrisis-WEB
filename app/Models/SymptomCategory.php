<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SymptomCategory extends Model
{
    protected $guarded = ['id'];

    // Kategori memiliki banyak gejala
    public function symptoms()
    {
        return $this->hasMany(Symptom::class, 'category_id');
    }
}
