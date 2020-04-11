<?php

namespace App\Http\Resources\Contact;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            "date_of_birth" =>$this->date_of_birth,
            "phone" => $this->phone,
            "address" => $this->address,
            "gender" => $this->gender,
            'status' => $this->status,
            "type" => $this->type,
            "message" => $this->message,
            "created_at" => $this->created_at ? $this->created_at->format('d-m-Y H:i') : null,
            "updated_at" => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null
        ];
    }
}
