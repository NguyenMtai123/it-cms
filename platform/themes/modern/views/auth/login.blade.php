@extends('theme::layouts.auth')

@section('title','Đăng nhập')

@section('content')
<div class="mb-3">

    <a href="/" class="back-home">

        <i class="bi bi-arrow-left-circle"></i>

        Quay lại trang chủ

    </a>

</div>
<div class="auth-card">

    <div class="auth-header">

        <img
            src="{{ setting('site_logo') }}"
            class="auth-logo">

        <div class="auth-title">
            Đăng nhập
        </div>

        <div class="auth-subtitle">
            Hệ thống thành viên
        </div>

    </div>

    <div class="auth-body">

        <form method="POST"
              action="{{ route('customer.login') }}">

            @csrf

            <div class="form-icon mb-3">
                <i class="bi bi-envelope"></i>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Email">
            </div>

            <div class="form-icon mb-3">
                <i class="bi bi-lock"></i>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Mật khẩu">
            </div>

            <button class="btn-auth w-100">
                Đăng nhập
            </button>

        </form>

        <div class="auth-divider">
            hoặc
        </div>

        <div class="auth-links">

            <a href="{{ route('customer.password.request') }}">
                Quên mật khẩu?
            </a>

            <br><br>

            Chưa có tài khoản?

            <a href="{{ route('customer.register') }}">
                Đăng ký ngay
            </a>

        </div>

    </div>

</div>

@endsection
