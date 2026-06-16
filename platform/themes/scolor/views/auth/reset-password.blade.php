@extends('theme::layouts.auth')

@section('title', 'Đặt lại mật khẩu')

@section('content')

<div class="auth-card">

    <div class="auth-header">

        <img src="{{ setting('site_logo') }}"
             class="auth-logo">

        <div class="auth-title">
            Đặt lại mật khẩu
        </div>

        <div class="auth-subtitle">
            Tạo mật khẩu mới cho tài khoản của bạn
        </div>

    </div>

    <div class="auth-body">

        <form method="POST"
              action="{{ route('customer.password.update') }}">

            @csrf

            <input type="hidden"
                   name="token"
                   value="{{ $token }}">

            <div class="mb-3 form-icon">

                <i class="fas fa-envelope"></i>

                <input type="email"
                       name="email"
                       value="{{ $email }}"
                       class="form-control"
                       placeholder="Email">

            </div>

            <div class="mb-3 form-icon">

                <i class="fas fa-lock"></i>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Mật khẩu mới">

            </div>

            <div class="mb-4 form-icon">

                <i class="fas fa-shield-alt"></i>

                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Nhập lại mật khẩu">

            </div>

            <button class="btn-auth w-100">

                <i class="fas fa-key me-2"></i>

                Đặt lại mật khẩu

            </button>

        </form>

    </div>

</div>

@endsection
