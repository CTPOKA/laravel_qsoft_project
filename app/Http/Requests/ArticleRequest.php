<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //'slug' => 'required|alpha_dash|unique:articles,slug',
            'title' => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'body' => 'required',
            'published' => 'boolean',

            'image' => ['sometimes', 'nullable', 'image'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'published' => $this->has('published'),
        ]);
    }
}
