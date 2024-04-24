<?php

namespace App\Http\Requests;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required|integer',
            'old_price' => ['sometimes', 'nullable', 'integer', 'gt:price'],
            'body' => '',
            'salon' => '',
            'kpp' => '',
            'year' => '',
            'color' => '',
            'is_new' => 'boolean',

            'car_engine_id' => ['required', 'exists:' . CarEngine::class . ',id'],
            'car_class_id' => ['required', 'exists:' . CarClass::class . ',id'],
            'car_body_id' => ['required', 'exists:' . CarBody::class . ',id'],
            'categories' => ['required', 'exists:' . Category::class . ',id'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_new' => $this->has('is_new'),
        ]);
    }
}
