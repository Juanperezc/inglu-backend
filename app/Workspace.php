<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
 

class Workspace extends Model
{
    use SoftDeletes;
    //
    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\UserWorkspace')->withPivot([
            'created_at',
            'updated_at',
        ]);;
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
