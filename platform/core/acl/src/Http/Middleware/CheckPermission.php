<?php

namespace Platform\Core\ACL\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission)
{
    $user = auth()->user();

    if (!$user) {
        abort(403);
    }

    if ($user->super_user) {
        return $next($request);
    }

    foreach ($user->roles as $role) {
        $permissions = $role->permissions ?? [];

        if (isset($permissions[$permission]) && $permissions[$permission] === true) {
            return $next($request);
        }
    }

    // user permission override
    $userPermissions = $user->permissions ?? [];

    if (isset($userPermissions[$permission]) && $userPermissions[$permission] === true) {
        return $next($request);
    }

    abort(403);
}
}
