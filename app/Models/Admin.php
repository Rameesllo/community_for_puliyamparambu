<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * Admin model — authenticates via the dedicated 'admin' guard.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role — 'ADMIN' | 'MANAGER'
 * @property string|null $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    /** @var list<string> */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /** @var list<string> */
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
            'password' => 'hashed',
        ];
    }

    /** Full administrator with unrestricted access. */
    public function isAdmin(): bool
    {
        return $this->role === 'ADMIN';
    }

    /** Manager — can manage content but not admin accounts/roles. */
    public function isManager(): bool
    {
        return $this->role === 'MANAGER';
    }

    /** All valid role values. */
    public static function roles(): array
    {
        return ['ADMIN', 'MANAGER'];
    }
}
