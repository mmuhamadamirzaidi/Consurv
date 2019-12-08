<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rig extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id', 'name',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
