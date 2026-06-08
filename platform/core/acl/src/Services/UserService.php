<?php

namespace Platform\Core\ACL\Services;

use Illuminate\Support\Facades\Hash;
use Platform\Core\ACL\Models\Role;
use Platform\Core\ACL\Models\User;
use Platform\Core\ACL\Repositories\UserRepository;

class UserService
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    public function create(array $data)
{
    $roleId = $data['role_id'] ?? null;

    unset($data['role_id']);

    $data['password'] = Hash::make($data['password']);

    $user = $this->repository->create($data);

    // FORCE admin role nếu không truyền role
    if (!$roleId) {
        $roleId = Role::where('slug', 'admin')->first()->id;
    }

    $user->roles()->sync([$roleId]);

    return $user;
}
    public function update(User $user, array $data)
    {
        $roleId = $data['role_id'] ?? null;

        unset($data['role_id']);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        // FIX: luôn sync kể cả null
        $user->roles()->sync($roleId ? [$roleId] : []);

        return $user;
    }
}
