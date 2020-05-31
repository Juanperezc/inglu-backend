<?php

namespace App\Http\Resources\SiteTeam;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteTeamResource extends JsonResource
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
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}
