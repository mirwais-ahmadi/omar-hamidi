<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_ADMIN = 'admin';

    public const ROLE_SITE_MANAGER = 'site_manager';

    public const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_SITE_MANAGER,
    ];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isSiteManager(): bool
    {
        return $this->role === self::ROLE_SITE_MANAGER;
    }

    public function canManageUsers(): bool
    {
        return $this->isAdmin();
    }

    public function canManageSite(): bool
    {
        return in_array($this->role, self::ROLES, true);
    }

    public function roleLabel(): string
    {
        return match ($this->role) {
            self::ROLE_ADMIN => 'مدیر کاربران',
            self::ROLE_SITE_MANAGER => 'مدیر سایت',
            default => $this->role,
        };
    }
}
