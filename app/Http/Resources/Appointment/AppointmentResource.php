<?php

namespace App\Http\Resources\Appointment;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{


    protected $user;

    public function user($value){
        $this->user = $value;
        return $this;
    }


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'doctor_photo' => $this->medical ? $this->medical->profile_pic : null,
            'photo' => $this->patient ? $this->patient->profile_pic : null,
            'patient' => $this->patient ? ($this->patient->name . " " . $this->patient->last_name) : ($this->contact->name . " " . $this->contact->last_name),
            'doctor' => $this->medical ? ($this->medical->name . " " . $this->medical->last_name) : null,
            'date' => $this->date->format('Y-m-d H:i'),
            'condition' => $this->condition,
            'location' => $this->workspace ? $this->workspace->location: null,
            'status' => $this->status,
            'treatment_description' => $this->treatment ? $this->treatment->description : null,
            'treatment_medicine' => $this->treatment ? $this->treatment->medicine : null,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'patient_id' => $this->patient_id,
            'medical_staff_id' => $this->medical_staff_id,
            'user_workspace_id' => $this->user_workspace_id,
            'comment' => $this->comment,
            'qualification' => $this->qualification,
        ];
    }
}
