<?php

namespace App\Livewire;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title( 'User Registration')]
class RegistrationComponent extends Component
{
    public ?string $name = null;
    public ?string $email = null;
    public ?string $password = null;
    public bool $registered = false;

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.registration');
    }

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
            'password' => Password::min(8)
                ->numbers()
                ->symbols(),
        ];
    }

    public function registerUser(): void
    {
        $this->validate();
        $this->reset();
        $this->registered = true;
    }
}
