<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{

    /** @phpstan-ignore-next-line  */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'password' => Password::min(8)->numbers()->symbols(),
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
