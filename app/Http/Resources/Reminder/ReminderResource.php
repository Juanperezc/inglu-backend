<?php

namespace App\Http\Resources\Reminder;

use Illuminate\Http\Resources\Json\JsonResource;

class ReminderResource extends JsonResource
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
            'date' => $this->date,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
            'created_at' => $this->created_at->format('d-m-Y H:i'),
        ];
    }
}
