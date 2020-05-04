<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserMedicalRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
            "id" => ($this && $this->id) ? $this->id : null,
            "blood_type" => $this && $this->blood_type ? $this->blood_type : null,
            "patient_status" => $this && $this->patient_status ? $this->patient_status: null,
            "pathologies" => $this && $this->pathologies ? $this->pathologies : null,
            "treatments" => $this && $this->treatments ? $this->treatments : null,
            "record" => $this && $this->record ? $this->record: null,
            "created_at" => $this && $this->created_at ? $this->created_at->format('d-m-Y H:i') : null,
            "updated_at" => $this && $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null
             ];
    }
}
