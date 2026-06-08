<?php

namespace Platform\Core\ACL\Support;

use Illuminate\Support\Facades\Auth;

class PermissionChecker
{
    public static function has(string $permission): bool
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        // super admin bypass
        if ($user->super_user) {
            return true;
        }

        foreach ($user->roles as $role) {
            $permissions = $role->permissions ?? [];

            if (
                isset($permissions[$permission])
                && $permissions[$permission] === true
            ) {
                return true;
            }
        }

        return false;
    }
}
