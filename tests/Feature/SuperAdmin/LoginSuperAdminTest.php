<?php

use App\Filament\SuperAdmin\Resources\UserResource;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('a super admin can see users', function () {
    $superUser = User::factory()->create();
    $superUser->super_admin = true;
    $superUser->save();
    actingAs($superUser);

    get(UserResource::getUrl('index',panel: 'super-admin'))->assertSuccessful();
});


test('a normal user cannot see users', function () {
    $normalUser = User::factory()->create();
    $normalUser->super_admin = false;
    $normalUser->save();
    actingAs($normalUser);

    get(UserResource::getUrl('index',panel: 'super-admin'))->assertStatus(403);
});
