<?php

namespace App\Http\Resources\Claim;

use Illuminate\Http\Resources\Json\JsonResource;

class ClaimUserResource extends JsonResource
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
            'text' => $this->text,
            'description' => $this->claim ? ($this->claim->description) : null,
            'user' => $this->user ? ($this->user->name . " " .  $this->user->last_name) : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null,
            'status' => $this->status
        ];
    }
}
