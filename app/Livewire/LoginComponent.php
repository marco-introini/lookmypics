<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title( 'Login')]
class LoginComponent extends Component
{
    #[Validate( 'required|email|max:255' )]
    public $email;
    #[Validate( 'required|min:8' )]
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login(): void
    {
        $this->validate();
        $this->redirect( route('dashboard'));
    }
}
