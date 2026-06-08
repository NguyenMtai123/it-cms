@extends('base::layouts.master')

@section('content')

<h1>Menus</h1>

@foreach($menus as $menu)
    <div class="card mb-2">
        <div class="card-body d-flex justify-content-between">

            <div>
                <strong>{{ $menu->name }}</strong>
                <small>({{ $menu->location }})</small>
            </div>

            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary btn-sm">
                Edit
            </a>

        </div>
    </div>
@endforeach

@endsection
