<?php

namespace App\Http\Requests;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class BasketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_id' => ['sometimes', 'exists:' . Car::class . ',id'],
            'user_id' => ['sometimes', 'exists:' . User::class . ',id'],
            'count' => ['sometimes', 'integer', 'min:1'],
        ];
    }
}
