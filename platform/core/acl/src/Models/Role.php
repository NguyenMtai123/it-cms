<?php

namespace Platform\Core\ACL\Models;

use Illuminate\Database\Eloquent\Model;
use Platform\Core\ACL\Models\User;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'permissions',
        'is_default',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'role_users',
            'role_id',
            'user_id'
        );
    }
}
