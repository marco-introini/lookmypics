<?php

namespace App\Livewire;

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

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.login');
    }

    public function login(): void
    {
        $this->validate();
        $this->redirect( route('dashboard'));
    }
}
