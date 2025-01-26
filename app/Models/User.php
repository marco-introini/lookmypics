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

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    #[\Override]
    public function canAccessPanel(Panel $panel): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public function isAdmin(): bool
    {
        return $this->role == UserRole::ADMIN;
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

    public function isActive(): bool
    {
        return isset($this->email_verified_at);
    }

    #[\Override]
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }
}
