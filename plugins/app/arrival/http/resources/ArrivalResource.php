<?php

namespace App\Arrival\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArrivalResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'created_at' => $this->created_at
        ];
    }
}