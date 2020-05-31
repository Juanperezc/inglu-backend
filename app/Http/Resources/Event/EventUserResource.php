<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class EventUserResource extends JsonResource
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
        'comment' => $this->comment,
        'qualification' => $this->qualification,
        'date' => $this->event ?  $this->event->date->format('d-m-Y H:i') : null,
        'updated_at' => $this->updated_at,
        'user' => $this->user ? ($this->user->name . " " .  $this->user->last_name) : null,
        'event' => $this->event ? ($this->event->name) : null,
        'description' => $this->event ? ($this->event->description) : null,
        'status' => ( $this->status == "send" ) ? 1 : (( $this->status == "confirmed" ) ? 2 : 3) 
        ];
    }
}
