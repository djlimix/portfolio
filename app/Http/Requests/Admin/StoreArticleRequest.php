<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest {
    public function rules(): array {
        return [
            'title' => ['required', 'string'],
            'text'  => ['required', 'string'],
            'bg'    => ['required', 'image']
        ];
    }

    public function authorize(): bool {
        return auth()->user()->isAdmin();
    }
}
