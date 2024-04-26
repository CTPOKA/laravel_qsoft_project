<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tags' => ''
        ];
    }

    protected function prepareForValidation()
    {
        $tags = collect(explode(',', $this->get('tags', '')));

        $tags = $tags
            ->map(fn ($item) => preg_replace('/\W/u', '', $item))
            ->filter(fn ($item) => ! empty($item))
        ;

        $this->merge(['tags' => $tags->all()]);
    }
}
