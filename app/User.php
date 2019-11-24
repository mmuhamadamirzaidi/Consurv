<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'phone_number', 'date_of_birth', 'company_id', 'rig_id', 
    ];

    protected $dates = [
        'date_of_birth',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIsMaleAttribute()
    {
        return $this->gender == 'M';
    }

    public function getIsFemaleAttribute()
    {
        return $this->gender == 'F';
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function healthInformation()
    {
        return $this->hasOne('App\HealthInformation', 'patient_id', 'id');
    }
}
