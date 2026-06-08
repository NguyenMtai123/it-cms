@extends('base::layouts.master')

@section('title', 'Theme Manager')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Theme Manager</h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($themes as $theme)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="mb-1">{{ $theme->name }}</h5>
                                <small class="text-muted">{{ $theme->slug }}</small>
                            </div>

                            @if($theme->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Inactive</span>
                            @endif
                        </div>

                        <hr>

                        <div class="mt-2">
                            @if($theme->is_active)
                                <button class="btn btn-success btn-sm btn-block" disabled>
                                    Current Theme
                                </button>
                            @else
                                <form method="POST" action="/admin/themes/{{ $theme->slug }}/activate">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">
                                        Activate Theme
                                    </button>
                                </form>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
