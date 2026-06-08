<?php

namespace Platform\Core\ACL\Traits;

trait HasPermissions
{
    public function hasPermission(string $permission): bool
{
    if ($this->super_user) {
        return true;
    }

    foreach ($this->roles as $role) {
        $permissions = $role->permissions ?? [];

        if (isset($permissions[$permission]) && $permissions[$permission] === true) {
            return true;
        }
    }

    $userPermissions = $this->permissions ?? [];

    return isset($userPermissions[$permission])
        && $userPermissions[$permission] === true;
}
}
