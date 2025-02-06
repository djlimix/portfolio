<?php

namespace App\Http\Requests\Admin;

use App\Enums\ProjectType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'link' => ['required', 'url'],
            'type' => ['required', new Enum(ProjectType::class)],
            'year' => ['required', 'date_format:Y'],
            'end' => ['nullable', 'date'],
            'images.*' => ['nullable', 'image'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }
}
