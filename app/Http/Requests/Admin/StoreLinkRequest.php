<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLinkRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required', 'string'],
            'url'   => ['required', 'url']
        ];
    }

    public function authorize(): bool {
        return auth()->user()->isAdmin();
    }
}
