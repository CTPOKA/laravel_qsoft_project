<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
<<<<<<< HEAD
=======
            'id' => $this->id,
>>>>>>> feature/284477.laravel3-4
            'name' => $this->name,
            'body' => $this->body,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'car_body' => $this->carBody?->name,
        ];
    }

    public function with($request): array
    {
        return [
<<<<<<< HEAD
            'car_id' => $this->id,
=======
>>>>>>> feature/284477.laravel3-4
            'success' => true,
        ];
    }
}
