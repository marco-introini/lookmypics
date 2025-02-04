<div class="container mx-auto px-4 sm:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <flux:input wire:model="email" type="email" label="Email" />
            <flux:input wire:model="password" type="password" label="Password" />
        </div>
        <div class="mt-12 flex justify-center">
            <flux:button class="min-w-48" wire:click="login">Login</flux:button>
        </div>

</div>
