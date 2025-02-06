<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'text' => ['required', 'string'],
            'bg' => ['sometimes', 'image'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }
}
