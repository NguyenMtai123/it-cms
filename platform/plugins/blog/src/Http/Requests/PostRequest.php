<?php

namespace Platform\Plugins\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],

            'status' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],

            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer'],

            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer'],
        ];
    }
}
