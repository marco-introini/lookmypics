<?php

namespace App\Livewire;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Registration extends Component
{
    public ?string $name;
    public ?string $email;
    public ?string $password;
    public bool $registered = false;

    public function render()
    {
        return view('livewire.registration');
    }

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
        ];
    }

    public function registerUser(): void
    {
        $this->validate();
        $this->reset();
        $this->registered = true;
    }
}
