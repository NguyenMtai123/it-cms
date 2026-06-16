@php
    use Platform\Core\Base\Menu\DashboardMenu;
    $menus = DashboardMenu::get();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- BRAND --}}
    <a href="{{ url('/admin') }}" class="brand-link">
        <span class="brand-text font-weight-light">

            @if (setting('site_logo'))
                <img src="{{ setting('site_logo') }}"
                    style="height:40px; width:40px; object-fit:cover; border-radius:50%;">
            @else
                <span class="brand-text">
                    {{ setting('site_title', 'IT CMS') }}
                </span>
            @endif
        </span>
        <small class="text-light opacity-75">
            CMS System
        </small>
    </a>

    <div class="sidebar">

        {{-- USER --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->avatar_url ?? asset('adminlte/dist/img/users.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">
                    {{ auth()->user()->username ?? 'Guest' }}
                </a>

                <small class="d-block mt-1">
                    <a href="{{ route('profile.edit') }}" class="text-light">Profile</a>
                    <span class="text-muted">|</span>
                    <a href="#" class="text-danger" data-toggle="modal" data-target="#logoutModal">
                        Logout
                    </a>
                </small>
            </div>
        </div>

        {{-- SEARCH (AdminLTE style) --}}
        <div class="form-inline mb-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- MENU --}}
        <nav class="mt-2">
            @include('base::partials.menu', ['menus' => $menus])
        </nav>
    </div>
</aside>
