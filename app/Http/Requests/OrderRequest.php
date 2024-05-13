<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:' . User::class . ',id'],
            'status' => 'sometimes',
        ];
    }

    protected function prepareForValidation()
    {
        /** @var User $user */
        $user = $this->user();

        $this->merge([
            'user_id' => $user->id,
        ]);
    }
}
