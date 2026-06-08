@extends('theme::layouts.auth')
@section('title','Đăng ký')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <h2 class="mb-4">Đăng ký tài khoản</h2>

        {{-- ERROR --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="mb-3">
                <label>Họ</label>
                <input type="text"
                       name="first_name"
                       value="{{ old('first_name') }}"
                       class="form-control @error('first_name') is-invalid @enderror">

                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Tên</label>
                <input type="text"
                       name="last_name"
                       value="{{ old('last_name') }}"
                       class="form-control @error('last_name') is-invalid @enderror">

                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror">

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Mật khẩu</label>
                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror">

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Xác nhận mật khẩu</label>
                <input type="password"
                       name="password_confirmation"
                       class="form-control">
            </div>

            <button class="btn btn-success w-100">
                Đăng ký
            </button>

        </form>

    </div>
</div>

@endsection
