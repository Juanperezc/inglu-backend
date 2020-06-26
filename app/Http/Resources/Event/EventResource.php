<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
      
        $pluck_users_id = $this->user ? $this->users->pluck('id'): []; 
        $is_event_user = $this->user && $pluck_users_id->search($this->user->id) ? 1 : 0;
        $event_user = $is_event_user ?  $this->users->filter(function($item) {
            return $item->id == $this->user->id;
        })->first() : null;
        /* return  $pluck_users_id; */
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
            'updated_at' =>  $this->updated_at,
            'created_at' =>  $this->created_at,
            'is_event_user' => $this->user && $pluck_users_id->search($this->user->id) ? 1 : 0,
            'comment' => $is_event_user == 1 ? $event_user->pivot->comment : null,
            'qualification' => $is_event_user == 1 ? $event_user->pivot->qualification : null,

        ];
    }
}
