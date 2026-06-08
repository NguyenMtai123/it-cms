@php
    use Platform\Core\Base\Menu\DashboardMenu;
    use Platform\Core\Acl\Support\PermissionChecker;

    $menus = DashboardMenu::get();
@endphp

<ul>
@foreach ($menus as $menu)
    @php
        $permission = $menu['permission'] ?? null;
    @endphp

    {{-- CHECK PARENT MENU --}}
    @if (!$permission || PermissionChecker::has($permission))
        <li>
            <strong>{{ $menu['name'] }}</strong>

            @if (!empty($menu['children']))
                <ul>
                    @foreach ($menu['children'] as $child)
                        @php
                            $childPermission = $child['permission'] ?? null;
                        @endphp

                        @if (!$childPermission || PermissionChecker::has($childPermission))
                            <li>
                                <a href="{{ $child['url'] }}">
                                    {{ $child['name'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </li>
    @endif
@endforeach
</ul>
