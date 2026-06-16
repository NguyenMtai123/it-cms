<?php

namespace Platform\Core\ACL\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Platform\Core\ACL\Models\Role;
use Platform\Core\ACL\Traits\HasPermissions;

class User extends Authenticatable
{
    use HasPermissions;
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'super_user',
        'manage_supers',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function isSuperUser(): bool
    {
        return (bool) $this->super_user;
    }

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_users',
            'user_id',
            'role_id'
        );
    }
}
