<?php

namespace Platform\Core\ACL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Platform\Core\ACL\Models\Role;
use Platform\Core\ACL\Models\User;

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
        if (
            !Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])
        ) {

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

    public function forgotPasswordForm()
    {
        return view('theme::auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink([
            'email' => $request->email
        ]);

        if ($status === Password::RESET_LINK_SENT) {

            return back()->with(
                'success',
                'Liên kết đặt lại mật khẩu đã được gửi tới email của bạn. Vui lòng kiểm tra hộp thư đến hoặc thư rác.'
            );
        }

        return back()->withErrors([
            'email' => 'Email không tồn tại.'
        ]);
    }
    public function resetPasswordForm(
        Request $request,
        string $token
    ) {
        return view(
            'theme::auth.reset-password',
            [
                'token' => $token,
                'email' => $request->email,
            ]
        );
    }

    public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only(
            'email',
            'password',
            'password_confirmation',
            'token'
        ),
        function ($user, $password) {

            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();
        }
    );

    if ($status == Password::PASSWORD_RESET) {

        return redirect()
            ->route('customer.login')
            ->with(
                'success',
                'Đặt lại mật khẩu thành công'
            );
    }

    return back()->withErrors([
        'email' => __($status)
    ]);
}
public function profile()
{
    return view(
        'theme::auth.profile',
        [
            'user' => auth()->user()
        ]
    );
}

public function updateProfile(Request $request)
{
    $request->validate([
        'first_name' => 'required',
        'last_name'  => 'required',
        'email'      => 'required|email',
    ]);

    auth()->user()->update([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'email'      => $request->email,
    ]);

    return back()->with(
        'success',
        'Cập nhật hồ sơ thành công'
    );
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:6|confirmed',
    ]);

    if (
        !Hash::check(
            $request->current_password,
            auth()->user()->password
        )
    ) {

        return back()->withErrors([
            'current_password' =>
                'Mật khẩu hiện tại không đúng'
        ]);
    }

    auth()->user()->update([
        'password' => Hash::make(
            $request->password
        )
    ]);

    return back()->with(
        'success',
        'Đổi mật khẩu thành công'
    );
}
}
