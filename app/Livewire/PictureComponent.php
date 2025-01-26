<?php

namespace App\Livewire;

use App\Models\Picture;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.no-distractions')]
class PictureComponent extends Component
{
    public ?Picture $picture;

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.picture-component')
            ->title($this->picture?->title ?? 'Picture');
    }
}
