<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {/* 
        return parent::toArray($request); */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'photo' => $this->photo,
            'category' => $this->category->description,
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
            'author' => $this->user ? ($this->user->name . " " .  $this->user->last_name) : null
        ];
    }
}
