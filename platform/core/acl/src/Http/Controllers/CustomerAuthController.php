<?php

namespace Platform\Core\ACL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Platform\Core\ACL\Models\User;
use Platform\Core\ACL\Models\Role;

class CustomerAuthController extends Controller
{
    public function loginForm()
    {
        return view('theme::auth.login');
    }

    public function registerForm()
    {
        return view('theme::auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $customerRole = Role::where('slug', 'customer')->first();

        $user->roles()->sync([$customerRole->id]);

        Auth::login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            return back()->withErrors([
                'email' => 'Sai email hoặc mật khẩu'
            ]);
        }

        $user = Auth::user();

        if (!$user->roles()->where('slug', 'customer')->exists()) {

            Auth::logout();

            return back()->withErrors([
                'email' => 'Không phải tài khoản khách hàng'
            ]);
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
