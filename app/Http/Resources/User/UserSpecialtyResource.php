<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSpecialtyResource extends JsonResource
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
            "id" => $this->id ? $this->id : null,
            "name" => $this->name,
            "description" => $this->description,
            "worker_limits" => $this->worker_limits,
            "created_at" => $this->created_at ? $this->created_at->format('d-m-Y H:i') : null,
            "updated_at" => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null
             ];
    }
}
