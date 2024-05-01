<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'body' => $this->body,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'car_body_id' => $this->car_body_id,
        ];
    }

    public function with($request): array
    {
        return [
            'car_id' => $this->id,
            'success' => true,
        ];
    }
}
