<?php

test('picture page contains Livewire', function (): void {
    get(route(''))
        ->assertSeeLivewire(LoginComponent::class);
});
