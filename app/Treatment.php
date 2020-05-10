<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    //
    protected $fillable = [
        'appointment_id', 'description', 'medicine'
    ];


    public function appointment()
    {
        return $this->belongsTo('App\Appointment', 'appointment_id');
    }

   
}
