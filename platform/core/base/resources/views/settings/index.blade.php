@extends('base::layouts.master')

@section('title', 'Settings')

@section('page-header')
    <h1>Settings</h1>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('settings.save') }}">

        @csrf

        <div class="card">

            <div class="card-header">
                General Settings
            </div>

            <div class="card-body">

                <!-- Hàng 1: Title và Email cùng hàng -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Title</label>
                            <input type="text" name="site_title" class="form-control" value="{{ setting('site_title') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Admin Email</label>
                            <input type="email" name="admin_email" class="form-control" value="{{ setting('admin_email') }}">
                        </div>
                    </div>
                </div>

                <!-- Hàng 2: Description giữ nguyên độ rộng -->
                <div class="form-group">
                    <label>Site Description</label>
                    <textarea name="site_description" class="form-control">{{ setting('site_description') }}</textarea>
                </div>

                <!-- Hàng 3: Logo và Favicon cùng hàng -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo</label>
                            <x-media-picker name="site_logo" :value="setting('site_logo')" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Favicon</label>
                            <x-media-picker name="site_favicon" :value="setting('site_favicon')" />
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-primary">
                    Save Settings
                </button>
            </div>

        </div>

    </form>

@endsection
