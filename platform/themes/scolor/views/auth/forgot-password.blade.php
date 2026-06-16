@extends('theme::layouts.auth')

@section('title', 'Quên mật khẩu')

@section('content')


<div class="auth-card">

    <div class="auth-header">

        <img src="{{ setting('site_logo') }}"
             class="auth-logo">

        <div class="auth-title">
            Quên mật khẩu
        </div>

        <div class="auth-subtitle">
            Nhập email để nhận liên kết đặt lại mật khẩu
        </div>

    </div>

    <div class="auth-body">

        <form method="POST"
              action="{{ route('customer.password.email') }}">

            @csrf

            <div class="mb-4 form-icon">

                <i class="fas fa-envelope"></i>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Địa chỉ email">

            </div>

            <button class="btn-auth w-100">
                <i class="fas fa-paper-plane me-2"></i>
                Gửi liên kết đặt lại mật khẩu
            </button>

        </form>

        <div class="auth-divider">
            hoặc
        </div>

        <div class="auth-links">

            <a href="{{ route('customer.login') }}">
                Quay lại đăng nhập
            </a>

        </div>

    </div>

</div>

@endsection
