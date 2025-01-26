<?php

namespace App\Livewire;

class DashboardComponent extends AdminComponent
{
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.dashboard');
    }
}
