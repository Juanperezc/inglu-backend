<?php

namespace App\Http\Resources\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{

   /*  protected $home;

    public function user($home){
        $this->home = $value;
        return $this;
    } */
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
            'profile_pic' => $this->user ? ($this->user->profile_pic) : null,
            'event' => $this->event ? ($this->event->name) : null,
            'description' => $this->event ? ($this->event->description) : null,
            'status' => ( $this->status == "send" ) ? 1 : (( $this->status == "confirmed" ) ? 2 : 3) 
            ];
    }
}
