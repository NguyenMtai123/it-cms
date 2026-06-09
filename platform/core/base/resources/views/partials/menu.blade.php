@php
    use Platform\Core\Base\Helpers\MenuHelper;
    $menus = $menus ?? [];
@endphp

<ul class="nav nav-pills nav-sidebar flex-column"
    data-widget="treeview"
    data-accordion="false"
    role="menu">

    {{-- <li class="nav-item">
        <a href="{{ url('/admin') }}"
           class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li> --}}

    @foreach ($menus as $menu)
        @php
            $hasChildren = !empty($menu['children']);
            $parentActive = $hasChildren ? MenuHelper::isParentActive($menu['children']) : false;
            $childActive = !$hasChildren ? MenuHelper::isActive($menu['url'] ?? '') : false;
        @endphp

        <li class="nav-item {{ $parentActive ? 'menu-open' : '' }}">
            <a href="{{ $hasChildren ? '#' : ($menu['url'] ?? '#') }}"
               class="nav-link {{ $parentActive || $childActive ? 'active' : '' }}">
                <i class="nav-icon {{ $menu['icon'] ?? 'far fa-circle' }}"></i>
                <p>
                    {{ $menu['name'] }}
                    @if ($hasChildren)
                        <i class="right fas fa-angle-left"></i>
                    @endif
                </p>
            </a>

            @if ($hasChildren)
                <ul class="nav nav-treeview">
                    @foreach ($menu['children'] as $child)
                        @php
                            $isActive = MenuHelper::isActive($child['url'] ?? '');
                        @endphp

                        <li class="nav-item px-3">
                            <a href="{{ $child['url'] ?? '#' }}"
                               class="nav-link {{ $isActive ? 'active' : '' }}">
                                <i class="{{ $child['icon'] ?? 'far fa-dot-circle' }} nav-icon"></i>
                                <p>{{ $child['name'] }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>

    @endforeach

    <li class="nav-item">
        <hr class="bg-secondary">
        <div class="pb-5">

            <p class="text-muted text-sm">PLUGINS</p>

            <ul class="nav nav-pills nav-sidebar flex-column">

                <li class="nav-item">
                    <a href="{{ url('/admin/media') }}" class="nav-link {{ request()->is('admin/media') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>Media Library</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/plugins') }}" class="nav-link {{ request()->is('admin/plugins') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-plug"></i>
                        <p>Plugins</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/admin/settings') }}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>

            </ul>
        </div>

    </div>
    </li>
</ul>
