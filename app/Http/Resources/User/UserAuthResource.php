<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use App\Http\Resources\User\UserResource;

class UserAuthResource extends JsonResource
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
            "user" => new UserResource($this),
            'token' =>  $this->token->accessToken,
            'time_login' =>  Carbon::now()->format('Y-m-d H:i:s')
            ];
    }
}
