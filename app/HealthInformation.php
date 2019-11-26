<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthInformation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_id', 'weight', 'height', 'hdlc', 'blood_pressure', 'treatment', 'total_cholesterol', 'diabetes', 'smoker', 'family_history', 'medical_history',
        'risk_point_age', 'risk_point_hdlc', 'risk_point_cholesterol', 'risk_point_blood_pressure', 'risk_point_diabetes', 'risk_point_smoker', 'total_points', 'risk_point_cvd', 'heart_age', 'risk_level', 
    ];

    public function patient()
    {
        return $this->belongsTo('App\User', 'patient_id');
    }

    public function getRiskLevelTextAttribute()
    {
        if ($this->risk_level == 1) {
            return 'Low';
        } else if ($this->risk_level == 2) {
            return 'Intermediate';
        } else if ($this->risk_level == 3) {
            return 'High';
        } else {
            return $this->risk_level;
        }
    }
}
