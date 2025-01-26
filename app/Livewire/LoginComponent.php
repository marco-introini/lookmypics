<?php

namespace App\Livewire;

use Flux;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Login')]
class LoginComponent extends Component
{
    #[Validate('required|email|max:255')]
    public ?string $email = null;
    #[Validate('required')]
    public ?string $password = null;

    public function render(
    ): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.login');
    }

    public function login(): void
    {
        $this->validate();

        if (\Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            $user = \Auth::user();
            if ($user->isActive()) {
                $this->redirectIntended(route('dashboard'), true);
                return;
            }
            Flux::toast(text: 'The email is not verified yet. Check your inbox for the verification email. ',
                heading: 'Email not verified!',
                duration: 0,
                variant: 'danger',
                position: "top right");
            exit;
        }

        Flux::toast(text: 'The email or password you provided is not correct',
            heading: 'Wrong Credentials!',
            duration: 0,
            variant: 'danger',
            position: "top right");
    }
}
