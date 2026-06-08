<?php

namespace Platform\Core\ACL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Platform\Core\ACL\Models\User;
use Platform\Core\ACL\Models\Role;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = User::whereHas('roles', function ($q) {
            $q->where('slug', 'customer');
        });

        if ($request->keyword) {
            $query->where(function ($q) use ($request) {

                $q->where('email', 'like', '%' . $request->keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%');
            });
        }

        $members = $query
            ->latest()
            ->paginate(2)
            ->withQueryString();

        return view('acl::members.index', compact('members'));
    }

    public function create()
    {
        return view('acl::members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:120'],
            'last_name' => ['required', 'string', 'max:120'],
            'username' => ['required', 'string', 'max:60', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $customerRole = Role::where('slug', 'customer')->first();

        $user->roles()->sync([$customerRole->id]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Customer created successfully');
    }
    public function edit($id)
    {
        $member = User::findOrFail($id);

        return view(
            'acl::members.edit',
            compact('member')
        );
    }
    public function update(Request $request, $id)
    {
        $member = User::findOrFail($id);

        $request->validate([
            'first_name' => ['required', 'string', 'max:120'],
            'last_name' => ['required', 'string', 'max:120'],
            'username' => ['required', 'string', 'max:60', 'unique:users,username,' . $member->id],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $member->id],
            'password' => ['nullable', 'min:6'],
        ]);

        $member->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $member->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()
            ->route('members.index')
            ->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back();
    }
}
