<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Appointment extends Model
{
    use Searchable;
    protected $dates = ['date', 'updated_at', 'created_at'];
    protected $fillable = [
        'date', 'condition', 'qualification',
        'comment', 'status', 'patient_id','contact_id',
        'medical_staff_id', 'user_workspace_id'
    ];

    public function toSearchableArray()
    {
        return [
            'patient' => $this->patient ? ($this->patient->name . " " . $this->patient->last_name) : null,
            'doctor' => $this->medical ? ($this->medical->name . " " . $this->medical->last_name) : null,
            'date' => $this->date,
            'condition' => $this->condition,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null,
        ];
    }

    public function medical()
    {
        return $this->belongsTo('App\User', 'medical_staff_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\User', 'patient_id');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact', 'contact_id');
    }

    public function treatment()
    {
        return $this->hasOne('App\Treatment', 'appointment_id');
    }

    public function workspace()
    {
        return $this->belongsTo('App\UserWorkspace', 'user_workspace_id');
    }

    public function searchableAs()
    {
        return 'appointments_index';
    }
    //
}
