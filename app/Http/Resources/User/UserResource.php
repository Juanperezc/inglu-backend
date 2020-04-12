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
            "id_card" =>$this->id_card,
            "profile_pic" => $this->profile_pic,
            "date_of_birth" =>$this->date_of_birth,
            "type" => $this->type,
            "phone" => $this->phone,
            "address" => $this->address,
            "gender" => $this->gender,
            "email_verified_at" => $this->email_verified_at,
            'status' => $this->status,
            'notifications' => $this->notifications,
            "created_at" => $this->created_at ? $this->created_at->format('d-m-Y H:i') : null,
            "updated_at" => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null
             ];
    }
}
