<?php

namespace App\Observers;

use App\HealthInformation;

class HealthInformationObserver
{
    /**
     * Handle the health information "created" event.
     *
     * @param  \App\HealthInformation  $healthInformation
     * @return void
     */
    public function created(HealthInformation $healthInformation)
    {
        $risk_point_age = $this->getRiskPointAge($healthInformation);
        $risk_point_hdlc = $this->getRiskPointHdlc($healthInformation->hldc);
        $risk_point_cholesterol = $this->getRiskPointCholesterol($healthInformation);
        $risk_point_blood_pressure = $this->getRiskPointBloodPressure($healthInformation);
        $risk_point_diabetes = $this->getRiskPointDiabetes($healthInformation);
        $risk_point_smoker = $this->getRiskPointSmoker($healthInformation);

        $healthInformation->update([
            'risk_point_age' => $risk_point_age,
            'risk_point_hdlc' => $risk_point_hdlc,
            'risk_point_cholesterol' => $risk_point_cholesterol,
            'risk_point_blood_pressure' => $risk_point_blood_pressure,
            'risk_point_diabetes' => $risk_point_diabetes,
            'risk_point_smoker' => $risk_point_smoker,
            'total_points' => $risk_point_age + $risk_point_hdlc + $risk_point_cholesterol + $risk_point_blood_pressure + $risk_point_diabetes + $risk_point_smoker,
        ]);
    }

    /**
     * Handle the health information "updated" event.
     *
     * @param  \App\HealthInformation  $healthInformation
     * @return void
     */
    public function updated(HealthInformation $healthInformation)
    {
        //
    }

    /**
     * Handle the health information "deleted" event.
     *
     * @param  \App\HealthInformation  $healthInformation
     * @return void
     */
    public function deleted(HealthInformation $healthInformation)
    {
        //
    }

    /**
     * Handle the health information "restored" event.
     *
     * @param  \App\HealthInformation  $healthInformation
     * @return void
     */
    public function restored(HealthInformation $healthInformation)
    {
        //
    }

    /**
     * Handle the health information "force deleted" event.
     *
     * @param  \App\HealthInformation  $healthInformation
     * @return void
     */
    public function forceDeleted(HealthInformation $healthInformation)
    {
        //
    }

    public function getRiskPointAge(HealthInformation $healthInformation)
    {
        if ($healthInformation->patient->is_male) {
            return $this->calculateAgeRiskPointMale($healthInformation->patient->age);
        } else {
            return $this->calculateAgeRiskPointFemale($healthInformation->patient->age);
        }
    }

    public function calculateAgeRiskPointMale($age)
    {
        if ($age <= 34) {
            return 0;
        } else if ($age <= 39) {
            return 2;
        } else if ($age <= 44) {
            return 5;
        } else if ($age <= 49) {
            return 7;
        } else if ($age <= 54) {
            return 8;
        } else if ($age <= 59) {
            return 10;
        } else if ($age <= 64) {
            return 11;
        } else if ($age <= 69) {
            return 13;
        } else if ($age <= 74) {
            return 14;
        } else {
            return 15;
        }
    }

    public function calculateAgeRiskPointFemale($age)
    {
        if ($age <= 34) {
            return 0;
        } else if ($age <= 39) {
            return 2;
        } else if ($age <= 44) {
            return 4;
        } else if ($age <= 49) {
            return 5;
        } else if ($age <= 54) {
            return 7;
        } else if ($age <= 59) {
            return 8;
        } else if ($age <= 64) {
            return 9;
        } else if ($age <= 69) {
            return 10;
        } else if ($age <= 74) {
            return 11;
        } else {
            return 12;
        }
    }

    public function getRiskPointHdlc($hdlc)
    {
        if ($hdlc < 0.9) {
            return 2;
        } else if ($hdlc <= 1.2) {
            return 1;
        } else if ($hdlc <= 1.3) {
            return 0;
        } else if ($hdlc <= 1.6) {
            return -1;
        } else {
            return -2;
        }
    }

    public function getRiskPointCholesterol(HealthInformation $healthInformation)
    {
        if ($healthInformation->patient->is_male) {
            return $this->getRiskPointCholesterolMale($healthInformation->total_cholesterol);
        } else {
            return $this->getRiskPointCholesterolFemale($healthInformation->total_cholesterol);
        }
    }

    public function getRiskPointCholesterolMale($total_cholesterol)
    {
        if ($total_cholesterol < 4.1) {
            return 0;
        } else if ($total_cholesterol <= 5.2) {
            return 1;
        } else if ($total_cholesterol <= 6.2) {
            return 2;
        } else if ($total_cholesterol <= 7.2) {
            return 3;
        } else {
            return 4;
        }
    }

    public function getRiskPointCholesterolFemale($total_cholesterol)
    {
        if ($total_cholesterol < 4.1) {
            return 0;
        } else if ($total_cholesterol <= 5.2) {
            return 1;
        } else if ($total_cholesterol <= 6.2) {
            return 3;
        } else if ($total_cholesterol <= 7.2) {
            return 4;
        } else {
            return 5;
        }
    }

    public function getRiskPointBloodPressure(HealthInformation $healthInformation)
    {
        if ($healthInformation->patient->is_male) {
            return $this->getRiskPointBloodPressureMale($healthInformation);
        } else {
            return $this->getRiskPointBloodPressureFemale($healthInformation);
        }
    }

    public function getRiskPointBloodPressureMale(HealthInformation $healthInformation)
    {
        if ($healthInformation->treatment) {
            if ($healthInformation->blood_pressure < 120) {
                return -2;
            } else if ($healthInformation->blood_pressure <= 129) {
                return 0;
            } else if ($healthInformation->blood_pressure <= 139) {
                return 1;
            } else if ($healthInformation->blood_pressure <= 149) {
                return 2;
            } else if ($healthInformation->blood_pressure <= 159) {
                return 2;
            } else {
                return 3;
            }
        } else {
            if ($healthInformation->blood_pressure < 120) {
                return 0;
            } else if ($healthInformation->blood_pressure <= 129) {
                return 2;
            } else if ($healthInformation->blood_pressure <= 139) {
                return 3;
            } else if ($healthInformation->blood_pressure <= 149) {
                return 4;
            } else if ($healthInformation->blood_pressure <= 159) {
                return 4;
            } else {
                return 5;
            }
        }
    }

    public function getRiskPointBloodPressureFemale(HealthInformation $healthInformation)
    {
        if ($healthInformation->treatment) {
            if ($healthInformation->blood_pressure < 120) {
                return -3;
            } else if ($healthInformation->blood_pressure <= 129) {
                return 0;
            } else if ($healthInformation->blood_pressure <= 139) {
                return 1;
            } else if ($healthInformation->blood_pressure <= 149) {
                return 2;
            } else if ($healthInformation->blood_pressure <= 159) {
                return 4;
            } else {
                return 5;
            }
        } else {
            if ($healthInformation->blood_pressure < 120) {
                return -1;
            } else if ($healthInformation->blood_pressure <= 129) {
                return 2;
            } else if ($healthInformation->blood_pressure <= 139) {
                return 3;
            } else if ($healthInformation->blood_pressure <= 149) {
                return 5;
            } else if ($healthInformation->blood_pressure <= 159) {
                return 6;
            } else {
                return 7;
            }
        }
    }

    public function getRiskPointDiabetes(HealthInformation $healthInformation)
    {
        if ($healthInformation->patient->is_male) {
            return $healthInformation->patient->diabetes ? 3 : 0;
        } else {
            return $healthInformation->patient->diabetes ? 4 : 0;
        }
    }

    public function getRiskPointSmoker(HealthInformation $healthInformation)
    {
        if ($healthInformation->patient->is_male) {
            return $healthInformation->patient->smoker ? 4 : 0;
        } else {
            return $healthInformation->patient->smoker ? 3 : 0;
        }
    }

    public function getRiskPointCvd(HealthInformation $healthInformation, $total_point)
    {
        if ($healthInformation->patient->is_male) {

        } else {

        }
    }
}

