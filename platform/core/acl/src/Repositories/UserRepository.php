<?php

namespace Platform\Core\ACL\Repositories;

use Platform\Core\ACL\Models\User;

class UserRepository
{
    public function paginate(int $perPage = 20)
    {
        return User::whereHas('roles', function ($q) {
            $q->where('slug', 'admin');
        })
        ->orderBy('id', 'desc')
        ->paginate($perPage);
    }

    public function find(int $id): ?User
    {
        return User::whereHas('roles', function ($q) {
            $q->where('slug', 'admin');
        })->find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }
}
