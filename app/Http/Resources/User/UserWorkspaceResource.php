<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserWorkspaceResource extends JsonResource
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
            "id" => $this->id,
            "specialty" => $this->specialty ? $this->specialty->name : null,
            "location" => $this->location,
            "worker_limits" => $this->specialty ? $this->specialty->worker_limits : null,
            "start_time"=> $this->time ? $this->time->start_time : null,
            "end_time"=> $this->time ? $this->time->end_time : null,
            "day"=> $this->time ? $this->time->day : null,
            "created_at" => $this->created_at ? $this->created_at->format('d-m-Y H:i') : null,
            "updated_at" => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null
            
       ];
     
    }
}
