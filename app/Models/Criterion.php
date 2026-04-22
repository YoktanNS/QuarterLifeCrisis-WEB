<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $guarded = ['id'];

    // Kriteria ini memiliki banyak nilai matriks dari berbagai action plan
    public function scores()
    {
        return $this->hasMany(ApCriteriaScore::class, 'criterion_id');
    }
}
