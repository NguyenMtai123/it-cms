@extends('base::layouts.master')

@section('title', 'Plugin Manager')

@section('content')

@php
    $total = $plugins->count();
    $installed = $plugins->where('is_installed', 1)->count();
    $active = $plugins->where('is_active', 1)->count();
@endphp

{{-- STATS --}}
<div class="row mb-3">

    <div class="col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total }}</h3>
                <p>Total Plugins</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $active }}</h3>
                <p>Active</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $installed }}</h3>
                <p>Installed</p>
            </div>
        </div>
    </div>

</div>

{{-- TABS --}}
<div class="mb-3">
    <a href="?tab=all" class="btn btn-sm btn-primary">All</a>
    <a href="?tab=installed" class="btn btn-sm btn-success">Installed</a>
    <a href="?tab=not-installed" class="btn btn-sm btn-dark">Not Installed</a>
</div>

{{-- GRID --}}
<div class="row">

@foreach ($plugins as $plugin)

<div class="col-md-4">

    <div class="card card-outline {{ $plugin->is_active ? 'card-success' : 'card-secondary' }}">

        <div class="card-header">
            <h5>{{ $plugin->name }}</h5>

            @if($plugin->is_installed)
                <span class="badge badge-info">Installed</span>
            @else
                <span class="badge badge-dark">Not Installed</span>
            @endif

        </div>

        <div class="card-body">
            <p>{{ $plugin->description }}</p>
        </div>

        <div class="card-footer d-flex justify-content-between">

            {{-- INSTALL --}}
            @if(!$plugin->is_installed)
                <form method="POST" action="/admin/plugins/{{ $plugin->id }}/install">
                    @csrf
                    <button class="btn btn-sm btn-primary">Install</button>
                </form>

            @else

                {{-- ACTIVE / INACTIVE --}}
                @if($plugin->is_active)
                    <form method="POST" action="/admin/plugins/{{ $plugin->id }}/deactivate">
                        @csrf
                        <button class="btn btn-sm btn-warning">Disable</button>
                    </form>
                @else
                    <form method="POST" action="/admin/plugins/{{ $plugin->id }}/activate">
                        @csrf
                        <button class="btn btn-sm btn-success">Enable</button>
                    </form>
                @endif

                {{-- UNINSTALL --}}
                <form method="POST" action="/admin/plugins/{{ $plugin->id }}/uninstall">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Uninstall plugin?')">
                        Uninstall
                    </button>
                </form>

            @endif

        </div>

    </div>

</div>

@endforeach

</div>

@endsection
