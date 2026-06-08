<?php

namespace Platform\Core\ACL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('acl::auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|between:6,255',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if (!$user->roles()->where('slug', 'admin')->exists()) {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Bạn không có quyền admin'
                ]);
            }

            $request->session()->regenerate();

            return redirect('/admin');
        }

        return back()->withErrors([
            'email' => 'Sai email hoặc mật khẩu',
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
