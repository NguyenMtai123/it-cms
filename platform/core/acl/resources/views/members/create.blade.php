@extends('base::layouts.master')

@section('content')

<div class="container-fluid">

    <form method="POST"
          action="{{ route('members.store') }}">

        @csrf

        <div class="row">

            {{-- LEFT --}}
            <div class="col-md-8">

                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">
                            Customer Information
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>First Name</label>

                                    <input
                                        type="text"
                                        name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ old('first_name') }}">

                                    @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <label>Last Name</label>

                                    <input
                                        type="text"
                                        name="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        value="{{ old('last_name') }}">

                                    @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <label>Username</label>

                            <input
                                type="text"
                                name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}">

                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-md-4">

                <div class="card card-info">

                    <div class="card-header">
                        <h3 class="card-title">
                            Account
                        </h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label>Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                Minimum 6 characters.
                            </small>

                        </div>

                    </div>

                </div>

                <div class="card">

                    <div class="card-body">

                        <button
                            type="submit"
                            class="btn btn-success btn-block">

                            <i class="fas fa-save"></i>

                            Create Customer

                        </button>

                        <a href="{{ route('members.index') }}"
                           class="btn btn-default btn-block">

                            Back

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection
