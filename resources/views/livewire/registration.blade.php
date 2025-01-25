<div>
Hello

    @if($registered)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
            <div><strong class="font-bold">Success!</strong></div>
            <span class="block sm:inline">User registered successfully. Check your email for confirmation</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <flux:icon.exclamation-circle />
            </span>
        </div>
    @endif

    <form method="POST" class="space-y-6">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 lg:grid-cols-3">
            <flux:input wire:model="name" type="text" label="Name" />
            <flux:input wire:model="email" type="email" label="Email" />
            <flux:input wire:model="password" type="password" label="Password" />
        </div>
        <div class="mt-6 flex justify-center">
            <flux:button class="min-w-48" wire:click="registerUser">Register</flux:button>
        </div>
    </form>
</div>
