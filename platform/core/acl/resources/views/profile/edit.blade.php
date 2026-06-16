@extends('base::layouts.master')

@section('title', 'Profile')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                {{-- LEFT --}}
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile text-center">

                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ $user->avatar_url ?? asset('adminlte/dist/img/user2-160x160.jpg') }}">

                            <h3 class="profile-username mt-3">
                                {{ $user->username ?? $user->email }}
                            </h3>

                            <p class="text-muted">
                                {{ $user->email }}
                            </p>

                        </div>
                    </div>
                </div>

                {{-- RIGHT --}}
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật thông tin</h3>
                        </div>

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>

                                            <input type="text" name="first_name"
                                                value="{{ old('first_name', $user->first_name) }}"
                                                class="form-control @error('first_name') is-invalid @enderror">

                                            @error('first_name')
                                                <span class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>

                                            <input type="text" name="last_name"
                                                value="{{ old('last_name', $user->last_name) }}"
                                                class="form-control @error('last_name') is-invalid @enderror">

                                            @error('last_name')
                                                <span class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Username</label>

                                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                                        class="form-control @error('username') is-invalid @enderror">

                                    @error('username')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email</label>

                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="form-control @error('email') is-invalid @enderror">

                                    @error('email')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label>Password mới</label>

                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nhập lại password</label>

                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror">

                                    @error('password_confirmation')
                                        <span class="invalid-feedback d-block">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary">
                                    Lưu thay đổi
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
