<?php

namespace Tests\Models;

use App\Models\User;

test('super admin return true', function (){
    // Create a super admin user
    $user = User::factory()->create(['super_admin' => true]);
    expect($user->isSuperAdmin())->toBeTrue();
});

test('normal user return false', function (){
    // Create a super admin user
    $user = User::factory()->create(['super_admin' => false]);
    expect($user->isSuperAdmin())->toBeFalse();
});

