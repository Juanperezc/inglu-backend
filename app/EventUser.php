<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventUser extends Pivot
{
    //
    protected $table = 'event_user';
    protected $fillable = [
        'comment', 'qualification', 'status'
    ];

  /*   public function specialty()
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
    } */
}
