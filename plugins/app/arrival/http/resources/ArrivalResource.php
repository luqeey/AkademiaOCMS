<?php

namespace App\Arrival\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use LibUser\Userapi\Http\Resources\UserResource;

class ArrivalResource extends JsonResource {
    public function toArray($request)
    {
        $this->load('user');

        return [
            'user' => new UserResource($this->whenLoaded('user')),
            'user_id' => $this->user_id,
            'name' => $this->name,
            'created_at' => $this->created_at
        ];
    }
}