<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\withoutVite;

beforeAll(function (){
    withoutVite();
});

test('a super admin can login', function () {
    actingAs(User::factory()->create([
        'super_admin' => true
    ]));

    get(\App\Filament\SuperAdmin\Resources\UserResource::getUrl('index'))->assertSuccessful();

});
