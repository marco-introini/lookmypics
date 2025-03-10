<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Override;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }

    #[Override]
    public function canAccessPanel(Panel $panel): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public function isAdmin(): bool
    {
        return $this->role == UserRole::ADMIN;
    }

    public function isActive(): bool
    {
        if ($this->role != UserRole::USER) {
            return false;
        }
        return isset($this->email_verified_at);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Album, $this>
     */
    public function albums(): HasMany
    {
        return $this->hasMany(Album::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Picture, $this>
     */
    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class, 'user_id');
    }

}
