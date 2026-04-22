<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QlcLevel extends Model
{
    protected $guarded = ['id'];

    // Tingkat QLC memiliki banyak rekomendasi tindakan
    public function actionPlans()
    {
        return $this->hasMany(ActionPlan::class, 'qlc_level_id');
    }
}
