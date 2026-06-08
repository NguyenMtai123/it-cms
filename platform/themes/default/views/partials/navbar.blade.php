@php
    $menus = collect(theme_menu('main'));
@endphp

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background:#0f172a;">
    <div class="container py-2">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/">
            <i class="bi bi-grid-1x2-fill text-info"></i>
            <span>{{ setting('site_title', 'IT CMS') }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                @foreach ($menus as $item)
                    @php
                        $url = trim(parse_url($item['url'], PHP_URL_PATH), '/');
                        $hideWhenAuth = in_array($url, ['login', 'register']);
                    @endphp

                    @if(auth()->check() && $hideWhenAuth)
                        @continue
                    @endif

                    <li class="nav-item">
                        <a class="nav-link px-lg-3 {{ request()->fullUrlIs($item['url']) ? 'active fw-semibold' : '' }}"
                           href="{{ $item['url'] }}"
                           @if (!empty($item['target_blank'])) target="_blank" rel="noopener" @endif>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
                <li class="nav-item">
    <a class="nav-link" href="/events">Events</a>
</li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ auth()->user()->first_name ?? auth()->user()->email }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('customer.logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Đăng ký</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
