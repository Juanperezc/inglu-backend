<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkspaceTime extends Model
{
    //
    protected $table = 'user_workspace_times';

    protected $fillable = [
        'start_time', 'end_time', 'day', 'user_workspace_id'
    ];

    public function user_workspace()
    {
        return $this->belongsTo('App\UserWorkspace');
    }
}
