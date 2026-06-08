<?php

namespace Platform\Core\ACL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Platform\Core\ACL\Models\Role;
use Platform\Core\ACL\Repositories\RoleRepository;
use Platform\Core\ACL\Services\RoleService;

class RoleController extends Controller
{
    public function __construct(
        protected RoleRepository $repository,
        protected RoleService $service
    ) {
    }

    public function index(Request $request)
    {
        $query = Role::query();

        if ($request->keyword) {
            $query->where('name', 'like', "%{$request->keyword}%")
                ->orWhere('slug', 'like', "%{$request->keyword}%");
        }

        $roles = $query->latest()->paginate(10);

        return view('acl::roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $permissions = [];

        foreach ($request->permissions ?? [] as $permission) {
            $permissions[$permission] = true;
        }

        $this->service->create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'permissions' => $permissions,
        ]);

        return redirect()->route('roles.index');
    }

    public function edit(int $id)
    {
        $role = Role::findOrFail($id);

        $permissions = config('acl.permissions');

        return view(
            'acl::roles.edit',
            compact('role', 'permissions')
        );
    }

    public function update(Request $request, int $id)
    {
        $role = Role::findOrFail($id);

        $permissions = [];

        foreach ($request->permissions ?? [] as $permission) {
            $permissions[$permission] = true;
        }

        $role->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'permissions' => $permissions,
        ]);

        return redirect()
            ->route('roles.index');
    }

    public function destroy(int $id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()
            ->route('roles.index');
    }

}
