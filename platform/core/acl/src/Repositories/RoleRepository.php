<?php

namespace Platform\Core\ACL\Repositories;

use Platform\Core\ACL\Models\Role;

class RoleRepository
{
    public function paginate()
    {
        return Role::latest()->paginate();
    }

    public function create(array $data)
    {
        return Role::create($data);
    }

    public function find(int $id)
    {
        return Role::find($id);
    }
}
