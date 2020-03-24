<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "email" => $this->email,
            "name" => $this->name,
            "last_name" => $this->last_name,
            "id_card" =>$this->dni,
            "email_verified_at" => $this->email_verified_at,
            'status' => $this->status,
            'notifications' => $this->notifications,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        
        ];
    }
}
