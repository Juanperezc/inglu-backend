<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserWorkspace extends Pivot
{
    //
    protected $table = 'user_workspace';
    protected $fillable = [
        'location', 'user_id' 
    ];

    public function specialty()
    {
        return $this->belongsTo('App\Specialty');
    }
    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
    public function time()
    {
        return $this->hasOne('App\UserWorkspaceTime', 'user_workspace_id');
    }
}
