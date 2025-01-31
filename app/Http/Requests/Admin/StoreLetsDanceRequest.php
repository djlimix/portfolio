<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLetsDanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'number'         => ['required', 'integer'],
            'guest'          => ['required'],
            'soundcloud'     => ['required'],
            'apple_podcasts' => ['required'],
            'hypeddit'       => ['required'],
            'artwork'        => ['nullable', 'image']
        ];
    }

    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }
}
