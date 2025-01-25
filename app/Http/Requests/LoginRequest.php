<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    /** @phpstan-ignore-next-line  */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'password' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
