@extends('theme::layouts.auth')

@section('title','Đăng ký')

@section('content')

<div class="auth-card">

    <div class="auth-header">

        <img
            src="{{ setting('site_logo') }}"
            class="auth-logo">

        <div class="auth-title">
            Đăng ký tài khoản
        </div>

        <div class="auth-subtitle">
            Tham gia cộng đồng thành viên
        </div>

    </div>

    <div class="auth-body">

        <form method="POST"
              action="{{ route('customer.register') }}">

            @csrf

            <div class="form-icon mb-3">
                <i class="bi bi-person"></i>

                <input
                    type="text"
                    name="first_name"
                    class="form-control"
                    placeholder="Họ">
            </div>

            <div class="form-icon mb-3">
                <i class="bi bi-person"></i>

                <input
                    type="text"
                    name="last_name"
                    class="form-control"
                    placeholder="Tên">
            </div>

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

            <div class="form-icon mb-3">
                <i class="bi bi-shield-lock"></i>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Nhập lại mật khẩu">
            </div>

            <button class="btn-auth w-100">
                Đăng ký
            </button>

        </form>

        <div class="auth-links">

            Đã có tài khoản?

            <a href="{{ route('customer.login') }}">
                Đăng nhập
            </a>

        </div>

    </div>

</div>

@endsection
