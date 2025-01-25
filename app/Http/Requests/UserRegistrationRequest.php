<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRegistrationRequest extends FormRequest
{
    /** @phpstan-ignore-next-line  */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => [
                'required',
                'max:255',
                Rule::email()
                    ->rfcCompliant(strict: false)
                    ->validateMxRecord()
                    ->preventSpoofing()
            ],
            'password' => Password::min(8)->numbers()->symbols(),
            'remember_token' => ['nullable'],
            'role' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
