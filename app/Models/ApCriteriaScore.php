<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApCriteriaScore extends Model
{
    protected $guarded = ['id'];

    // Nilai ini milik action plan apa?
    public function actionPlan()
    {
        return $this->belongsTo(ActionPlan::class, 'action_plan_id');
    }

    // Nilai ini untuk kriteria apa?
    public function criterion()
    {
        return $this->belongsTo(Criterion::class, 'criterion_id');
    }
}
