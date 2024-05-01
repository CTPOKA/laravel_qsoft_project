<?php

namespace App\Http\Requests\Api;

use App\Models\CarBody;

class UpdateCarRequest extends CreateCarRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required'],
            'price' => ['sometimes', 'required', 'integer'],
            'old_price' => ['sometimes', 'nullable', 'integer', 'gt:price'],
            'body' => ['sometimes', 'required'],
            'car_body_id' => ['sometimes', 'required', 'exists:' . CarBody::class . ',id'],
        ];
    }
}
