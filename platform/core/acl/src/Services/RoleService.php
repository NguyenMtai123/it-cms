<?php

namespace Platform\Core\ACL\Services;

use Platform\Core\ACL\Repositories\RoleRepository;

class RoleService
{
    public function __construct(
        protected RoleRepository $repository
    ) {
    }

    public function create(array $data)
    {
        // $permissions = [];

        // foreach ($data['permissions'] ?? [] as $permission) {
        //     $permissions[$permission] = true;
        // }

        // $data['permissions'] = $permissions;
        return $this->repository->create($data);
    }
}
