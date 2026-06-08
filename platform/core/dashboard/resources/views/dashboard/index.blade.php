@extends('base::layouts.master')

@php
    use Platform\Core\Dashboard\Widgets\WidgetManager;
    use Platform\Core\Base\Menu\DashboardMenu;

    $widgets = WidgetManager::all();
    $menus = DashboardMenu::get();
@endphp

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Dashboard</h3>
            <small class="text-muted">Overview system statistics & management</small>
        </div>

        <a href="/admin/logout" class="btn btn-outline-danger btn-sm">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </div>

    {{-- WIDGETS --}}
    <div class="row">
        @foreach ($widgets as $widget)
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body d-flex align-items-center">

                        {{-- ICON --}}
                        <div class="mr-3">
                            <div style="
                                width:50px;
                                height:50px;
                                border-radius:12px;
                                background:#eef2ff;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                font-size:20px;
                                color:#4f46e5;
                            ">
                                <i class="fas fa-{{ $widget['icon'] ?? 'chart-bar' }}"></i>
                            </div>
                        </div>

                        {{-- CONTENT --}}
                        <div>
                            <div class="text-muted small">
                                {{ $widget['title'] }}
                            </div>

                            <div class="h4 mb-0 font-weight-bold">
                                {{ $widget['value'] }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach
    </div>

    {{-- MENU --}}
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-header bg-white">
            <strong>Quick Menu</strong>
        </div>

        <div class="card-body">
            <div class="row">

                @foreach ($menus as $menu)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">

                        <div class="border rounded p-3 h-100 menu-item"
                             style="transition:.2s; cursor:pointer;">

                            {{-- PARENT MENU --}}
                            <div class="d-flex align-items-center mb-2">

                                <div style="
                                    width:38px;
                                    height:38px;
                                    border-radius:10px;
                                    background:#f3f4f6;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    margin-right:10px;
                                ">
                                    <i class="fas fa-{{ $menu['icon'] ?? 'folder' }}"></i>
                                </div>

                                <div>
                                    @if (!empty($menu['url']))
                                        <a href="{{ $menu['url'] }}" class="font-weight-bold text-dark">
                                            {{ $menu['name'] }}
                                        </a>
                                    @else
                                        <strong>{{ $menu['name'] }}</strong>
                                    @endif
                                </div>

                            </div>

                            {{-- CHILDREN --}}
                            @if (!empty($menu['children']))
                                <div class="pl-5">
                                    @foreach ($menu['children'] as $child)
                                        <div class="mb-1">
                                            <a href="{{ $child['url'] ?? '#' }}" class="text-muted small">
                                                • {{ $child['name'] }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>

</div>

{{-- HOVER EFFECT --}}
<style>
.menu-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,.08);
}
</style>

@endsection
