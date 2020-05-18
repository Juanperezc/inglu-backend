<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            "name" => $this->name,
            "picture" => $this->picture,
            "description" =>$this->description,
            "date" => $this->date,
            "doctor_id" =>$this->doctor_id,
            "limit" =>$this->limit,
            "type" => $this->type,
            "location" => $this->location,
            "status" => $this->status == 'enabled' ? 0: 1,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null,
            'created_at' => $this->created_at ? $this->created_at->format('d-m-Y H:i') : null,
        ];
    }
}
