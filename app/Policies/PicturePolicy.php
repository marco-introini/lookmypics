<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PicturePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Picture $picture): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        if ($user->role === UserRole::ADMIN) {
            return true;
        }

        return false;
    }

    public function update(User $user, Picture $picture): bool
    {
        if ($picture->user_id == $user->id) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Picture $picture): bool
    {
        if ($picture->user_id == $user->id) {
            return true;
        }

        return false;
    }

}
