<?php

namespace App\Livewire;

use Flux;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title( 'Login')]
class LoginComponent extends Component
{
    #[Validate( 'required|email|max:255' )]
    public ?string $email = null;
    #[Validate( 'required|min:8' )]
    public ?string $password = null;
    public ?string $loginMessage = null;

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.login');
    }

    public function login(): void
    {
        $this->validate();

        $valid = \Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ]);

        if ($valid) {
            $this->redirectIntended(route('dashboard'), true);
        } else {
            $this->loginMessage = 'Incorrect email and/or password';
        }

        Flux::toast(text: 'The email or password you provided is not correct', heading: 'Wrong Credential!', duration: 0, variant: 'danger', position: "top right");
    }
}
