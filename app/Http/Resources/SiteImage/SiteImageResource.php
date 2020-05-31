<?php

namespace App\Http\Resources\SiteImage;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
