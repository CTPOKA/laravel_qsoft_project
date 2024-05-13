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
            'car_id' => ['required', 'exists:' . Car::class . ',id'],
            'user_id' => ['required', 'exists:' . User::class . ',id'],
            'count' => ['sometimes', 'integer', 'min:1'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user()->id,
        ]);
    }
}
