@extends('base::layouts.master')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Menus</h2>
        <a href="{{ route('menus.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Menu
        </a>
    </div>

    @foreach($menus as $menu)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $menu->name }}</strong>
                    <small class="text-muted">({{ $menu->location }})</small>
                </div>

                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary btn-sm">
                    Edit
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
