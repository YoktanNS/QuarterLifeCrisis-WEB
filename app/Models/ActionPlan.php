<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionPlan extends Model
{
    protected $guarded = ['id'];

    // Action plan ini ditujukan untuk tingkat QLC tertentu
    public function qlcLevel()
    {
        return $this->belongsTo(QlcLevel::class, 'qlc_level_id');
    }

    // Action plan ini memiliki banyak nilai kriteria (Matriks SAW)
    public function criteriaScores()
    {
        return $this->hasMany(ApCriteriaScore::class, 'action_plan_id');
    }
}
