<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    public function medical()
    {
        return $this->belongsTo('App\User', 'medical_staff_id');
    }
    public function patient()
    {
        return $this->belongsTo('App\User', 'patient_id');
    }

    public function workspace()
    {
        return $this->belongsTo('App\Workspace');
    }
    //
}
