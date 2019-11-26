<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'address',
    ];

    public function rigs()
    {
        return $this->hasMany('App\Rig');
    }
}
