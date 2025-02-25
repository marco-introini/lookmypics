<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasColor, HasLabel
{
    case ADMIN = 'ADMIN';
    case USER = 'USER';

    public function getColor(): string
    {
        return match ($this) {
            self::ADMIN => 'error',
            self::USER => 'info',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::USER => 'User',
        };
    }
}
