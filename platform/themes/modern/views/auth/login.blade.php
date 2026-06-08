@extends('theme::layouts.auth')
@section('title','Đăng nhập')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-body p-4">

        <h2 class="mb-4">Đăng nhập</h2>

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

        <form method="POST" action="/login">
            @csrf

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

            <button class="btn btn-primary w-100">
                Đăng nhập
            </button>

        </form>

    </div>
</div>

@endsection
