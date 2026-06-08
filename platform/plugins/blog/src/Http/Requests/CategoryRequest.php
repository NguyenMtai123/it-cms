<?php

namespace Platform\Plugins\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'parent_id' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
