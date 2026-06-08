<?php

namespace Platform\Core\ACL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Platform\Core\ACL\Models\Role;
use Platform\Core\ACL\Repositories\UserRepository;
use Platform\Core\ACL\Services\UserService;

class UserController extends Controller
{
    public function __construct(
        protected UserRepository $repository,
        protected UserService $service
    ) {
    }

    public function index()
    {
        $users = $this->repository->paginate();

        return view(
            'acl::users.index',
            compact('users')
        );
    }

    public function create()
    {
        $roles = Role::where('slug', 'admin')->get();

        return view('acl::users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $this->service->create(
            $request->all()
        );

        return redirect()
            ->route('users.index');
    }

    public function edit(int $id)
    {
        $user = $this->repository->find($id);

        if (!$user) {
            abort(404);
        }

        $roles = Role::all();

        return view(
            'acl::users.edit',
            compact('user', 'roles')
        );
    }

    public function update(
        Request $request,
        int $id
    ) {
        $user = $this->repository->find($id);

        if (!$user) {
            abort(404);
        }

        $this->service->update(
            $user,
            $request->all()
        );

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated');
    }

    public function destroy(int $id)
    {
        $user = $this->repository->find($id);

        if (!$user) {
            abort(404);
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted');
    }
}
