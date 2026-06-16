@extends('theme::layouts.auth')

@section('title', 'Tài khoản')

@section('content')
<div class="mb-3">

    <a href="/" class="back-home">

        <i class="bi bi-arrow-left-circle"></i>

        Quay lại trang chủ

    </a>

</div>
<div class="auth-card">

    <div class="auth-header">

        <div class="profile-avatar">
            {{ strtoupper(substr($user->first_name,0,1)) }}
        </div>

        <h2 class="auth-title">
            {{ $user->first_name }}
            {{ $user->last_name }}
        </h2>

        <p class="auth-subtitle">
            {{ $user->email }}
        </p>

    </div>

    <div class="auth-body">

        @if(session('success'))

            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>

        @endif

        <ul class="nav nav-pills mb-4">

            <li class="nav-item">
                <button
                    class="nav-link active"
                    data-bs-toggle="pill"
                    data-bs-target="#profile-tab">

                    Hồ sơ cá nhân
                </button>
            </li>

            <li class="nav-item">
                <button
                    class="nav-link"
                    data-bs-toggle="pill"
                    data-bs-target="#password-tab">

                    Đổi mật khẩu
                </button>
            </li>

        </ul>

        <div class="tab-content">

            <div
                class="tab-pane fade show active"
                id="profile-tab">

                <form
                    method="POST"
                    action="{{ route('customer.profile.update') }}">

                    @csrf

                    <div class="mb-3">
                        <label>Họ</label>

                        <input
                            type="text"
                            name="first_name"
                            value="{{ $user->first_name }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Tên</label>

                        <input
                            type="text"
                            name="last_name"
                            value="{{ $user->last_name }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            value="{{ $user->email }}"
                            class="form-control">
                    </div>

                    <button class="btn-auth w-100">
                        Cập nhật hồ sơ
                    </button>

                </form>

            </div>

            <div
                class="tab-pane fade"
                id="password-tab">

                <form
                    method="POST"
                    action="{{ route('customer.password.change') }}">

                    @csrf

                    <div class="mb-3">
                        <label>Mật khẩu hiện tại</label>

                        <input
                            type="password"
                            name="current_password"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Mật khẩu mới</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Nhập lại mật khẩu</label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control">
                    </div>

                    <button class="btn-auth w-100">
                        Đổi mật khẩu
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
