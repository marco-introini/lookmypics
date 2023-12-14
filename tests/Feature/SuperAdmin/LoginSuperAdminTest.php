<?php

use App\Filament\SuperAdmin\Resources\UserResource;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('a super admin can login', function () {
    $superUser = User::factory()->create();
    $superUser->super_admin = true;
    $superUser->save();
    actingAs($superUser);

    ray($superUser);
    ray(get(UserResource::getUrl('index',panel: 'super-admin')));//->assertSuccessful();

});
