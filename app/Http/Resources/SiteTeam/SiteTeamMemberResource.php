<?php

namespace App\Http\Resources\SiteTeam;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteTeamMemberResource extends JsonResource
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
            'img' => $this->img,
            'name' => $this->name,
            'role' => $this->role,
            'updated_at' => $this->updated_at,
        ];
    }
}
