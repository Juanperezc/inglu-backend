<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Walkthrough extends Model
{
    use SoftDeletes;
    protected $casts = [
        'roles' => 'array'
    ];
    //
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
