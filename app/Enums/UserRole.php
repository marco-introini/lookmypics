<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'ADMIN';
    case USER = 'USER';
    case SUPER_ADMIN = 'SUPERADMIN';
}
