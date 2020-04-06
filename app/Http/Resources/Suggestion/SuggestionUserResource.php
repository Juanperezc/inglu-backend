<?php

namespace App\Http\Resources\Suggestion;

use Illuminate\Http\Resources\Json\JsonResource;

class SuggestionUserResource extends JsonResource
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
            'description' => $this->suggestion ? ($this->suggestion->description) : null,
            'user' => $this->user ? ($this->user->name . " " .  $this->user->last_name) : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d-m-Y H:i') : null,
            'status' => $this->status
        ];
    }
}
