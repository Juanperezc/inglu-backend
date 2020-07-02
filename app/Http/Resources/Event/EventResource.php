<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
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
      
        $user_id =  $this->user ? $this->user->id : null;
        $pluck_users_id = $this->user ? $this->users->pluck("id"): collect([]); 
  /*       $pluck_users_id = is_array($pluck_users_id) ? $pluck_users_id : collect($pluck_users_id); */
        $is_event_user =  0 ;
        if ($this->user){
            foreach ($pluck_users_id as $val ) {
                if ($val == $user_id) 
                $is_event_user = 1;
            }
        }
       
        $event_user = $is_event_user ?  $this->users->filter(function($item) use ($user_id) {
            return $item->id == $user_id;
        })->first() : null;
       /*   return  ["user_Id" => $user_id, "test" =>  $is_event_user, "test2" => $pluck_users_id, "test3" => in_array(10,[10])];  */
     $status = null;
        switch($this->status){
            case "enable": {
                $status = 1;
            break;
            }
            case "disabled": {
                $status = 2;
            break;
            }
            case "terminated": {
                $status = 3;
            break;
            }
        } 

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
            "status" => $status,
            'updated_at' =>  $this->updated_at,
            'created_at' =>  $this->created_at,
            'is_event_user' => $this->user &&  $is_event_user,
            'event_user_id' =>  $is_event_user == 1 ? $event_user->pivot->id : null,
            'comment' => $is_event_user == 1 ? $event_user->pivot->comment : null,
            'qualification' => $is_event_user == 1 ? $event_user->pivot->qualification : null,

        ];
    } 
}
