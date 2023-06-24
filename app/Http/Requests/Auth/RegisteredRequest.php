<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisteredRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => [
                'required',
                'email:dns',
                'string',
                'unique:users'
            ],
            'password' => [
                'required',
                'confirmed',
                Password::default()
            ],
            'password_confirmation' => ['required'],
        ];
    }
}
