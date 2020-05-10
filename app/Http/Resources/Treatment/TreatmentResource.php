<?php

namespace App\Http\Resources\Treatment;

use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentResource extends JsonResource
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
            'id' => $this->id,
            'appointment_id' => $this->appointment_id,
            'description' => $this->description,
            'medicine' => $this->medicine,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y H:i') : null,
        
        ];
    }
}
