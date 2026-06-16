<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', setting('site_title', 'IT CMS'))</title>

    @if (setting('site_favicon'))
        <link rel="icon" href="{{ asset('storage/' .setting('site_favicon')) }}">
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #0f766e;
            --primary-2: #14b8a6;
            --accent: #f59e0b;
            --dark: #0f172a;
            --muted: #64748b;
            --bg: #f5f7fb;
            --card: #ffffff;
            --line: #e5e7eb;
            --radius: 24px;
            --radius-sm: 18px;
            --shadow: 0 14px 40px rgba(15, 23, 42, .08);
            --shadow-hover: 0 18px 50px rgba(15, 23, 42, .14);
        }

        html,
        body {
            overflow-x: hidden;
        }

        body {
            background: var(--bg);
            color: #111827;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
        }

        .site-content {
            min-height: 70vh;
        }

        .container-wide {
            max-width: 1480px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -.03em;
            color: var(--dark);
            margin-bottom: 18px;
        }

        .section-subtitle {
            color: var(--muted);
            margin-bottom: 0;
        }

        .soft-card,
        .news-card,
        .info-card,
        .feature-card,
        .announcement-card,
        .story-card,
        .about-card,
        .admission-card,
        .video-panel {
            border: 1px solid rgba(255, 255, 255, .65);
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(12px);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .soft-card:hover,
        .news-card:hover,
        .info-card:hover,
        .feature-card:hover,
        .announcement-card:hover,
        .story-card:hover,
        .about-card:hover,
        .admission-card:hover {
            box-shadow: var(--shadow-hover);
        }

        .text-soft {
            color: var(--muted);
        }

        .badge-soft {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(15, 118, 110, .10);
            color: var(--primary);
            font-weight: 700;
            font-size: 13px;
        }

        .clamp-2,
        .clamp-3 {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp-2 {
            -webkit-line-clamp: 2;
        }

        .clamp-3 {
            -webkit-line-clamp: 3;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1030;
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(229, 231, 235, .8);
        }

        .topbar {
            background: #0f172a;
            color: #fff;
            font-size: 14px;
        }

        .topbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 42px;
        }

        .topbar-left,
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .topbar a {
            color: rgba(255, 255, 255, .9);
            text-decoration: none;
            transition: .2s;
        }

        .topbar a:hover {
            color: #fff;
        }

        .topbar i {
            margin-right: 4px;
        }

        .user-dropdown {
            position: relative;
        }

        .user-toggle {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .user-menu {
            position: absolute;
            top: 100%;
            margin-top: 0;
            right: 0;
            min-width: 220px;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
            display: none;
            z-index: 999;
        }

        .user-dropdown:hover .user-menu {
            display: block;
        }

        .user-menu a,
        .user-menu button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border: 0;
            background: transparent;
            color: #334155;
            text-align: left;
        }

        .user-menu a:hover,
        .user-menu button:hover {
            background: #f8fafc;
            color: var(--primary);
        }

        .user-menu form {
            margin: 0;
        }

        @media (max-width: 991px) {

            .topbar .container {
                flex-direction: column;
                padding: 8px 12px;
                gap: 8px;
            }

            .topbar-left,
            .topbar-right {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        .top-strip {
            background: linear-gradient(90deg, var(--dark), #13304d);
            color: rgba(255, 255, 255, .92);
            font-size: 13px;
        }

        .top-strip a {
            color: rgba(255, 255, 255, .92);
        }

        .brand-row {
            padding: 14px 0;
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .brand-logo {
            width: 62px;
            height: 62px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-text {
            min-width: 0;
        }

        .site-title {
            font-size: 20px;
            font-weight: 900;
            letter-spacing: -.02em;
            color: var(--dark);
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .site-subtitle {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.35;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-pill {
            position: relative;
            min-width: 300px;
            max-width: 100%;
        }

        .search-pill input {
            width: 100%;
            height: 46px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: #fff;
            padding: 0 52px 0 18px;
            outline: none;
            box-shadow: 0 6px 22px rgba(15, 23, 42, .04);
        }

        .search-pill button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            width: 38px;
            height: 38px;
            border: 0;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            color: #fff;
        }

        .nav-wrap {
            border-top: 1px solid rgba(229, 231, 235, .7);
        }

        .navbar {
            padding: 0;
            background: transparent !important;
        }

        .navbar-nav .nav-link {
            color: #0f172a !important;
            font-weight: 700;
            font-size: 15px;
            padding: 16px 14px !important;
            border-radius: 12px;
            transition: .2s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--primary) !important;
            background: rgba(15, 118, 110, .08);
        }

        .dropdown-menu {
            border: 0;
            border-radius: 18px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .dropdown-item {
            padding: 12px 18px;
        }

        .dropdown-item:hover {
            background: rgba(15, 118, 110, .08);
            color: var(--primary);
        }

        .site-footer {
            background: #f8fafc;
            border-top: 1px solid var(--line);
            color: #334155;
        }

        .footer-title {
            font-size: 18px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 14px;
        }

        .footer-link {
            display: block;
            color: #475569;
            padding: 6px 0;
        }

        .footer-link:hover {
            color: var(--primary);
        }

        .footer-brand {
            display: flex;
            gap: 14px;
            align-items: center;
            margin-bottom: 14px;
        }

        .footer-brand img {
            width: 58px;
            height: 58px;
            object-fit: contain;
        }

        .footer-note {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .footer-bottom {
            border-top: 1px solid var(--line);
            color: #64748b;
            font-size: 14px;
        }

        .btn-theme {
            border: 0;
            border-radius: 999px;
            padding: 11px 18px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            color: #fff;
            box-shadow: 0 10px 22px rgba(15, 118, 110, .18);
        }

        .btn-theme:hover {
            color: #fff;
            opacity: .96;
            transform: translateY(-1px);
        }

        .btn-theme-outline {
            border-radius: 999px;
            padding: 11px 18px;
            font-weight: 700;
            border: 1px solid rgba(15, 118, 110, .20);
            color: var(--primary);
            background: #fff;
        }

        .btn-theme-outline:hover {
            background: rgba(15, 118, 110, .08);
            color: var(--primary);
        }

        @media (max-width: 991px) {
            .search-pill {
                min-width: 100%;
            }

            .header-actions {
                width: 100%;
                flex-wrap: wrap;
            }

            .navbar-nav .nav-link {
                padding: 12px 0 !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    <header class="site-header">
        @php
            use Platform\Core\Base\Services\MenuService;

            $topbar = MenuService::getByLocation('topbar');
        @endphp

        <div class="topbar">

            <div class="container container-wide">

                <div class="topbar-left">

                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <span><i class="bi bi-geo-alt me-1"></i>
                            {{ setting('site_address', 'Nha Trang, Khánh Hòa') }}</span>
                        <span><i class="bi bi-telephone me-1"></i> {{ setting('site_phone', '0258 123 4567') }}</span>
                    </div>

                </div>

                <div class="topbar-right">

                    @foreach ($topbar?->items ?? [] as $item)
                        <a href="{{ $item->url }}">
                            {{ $item->label }}
                        </a>
                    @endforeach

                    @guest

                        <a href="{{ route('customer.login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Đăng nhập
                        </a>
                    @else
                        <div class="user-dropdown">

                            <a href="#" class="user-toggle">

                                <i class="bi bi-person-circle"></i>

                                Xin chào,

                                <strong>
                                    {{ auth()->user()->first_name }}
                                </strong>

                                <i class="bi bi-chevron-down"></i>

                            </a>

                            <div class="user-menu">

                                <a href="{{ route('customer.profile') }}">
                                    <i class="bi bi-person"></i>
                                    Hồ sơ cá nhân
                                </a>

                                <form method="POST" action="{{ route('customer.logout') }}">
                                    @csrf

                                    <button type="submit">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Đăng xuất
                                    </button>
                                </form>

                            </div>

                        </div>

                    @endguest

                </div>

            </div>

        </div>
        <div class="container container-wide brand-row px-3">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                <a href="{{ url('/') }}" class="brand-wrap text-decoration-none">
                    <img class="brand-logo" src="{{ asset('storage/' .setting('site_logo', '')) }}"
                        alt="{{ setting('site_title', 'IT CMS') }}" onerror="this.style.display='none'">
                    <div class="brand-text">
                        <div class="site-title">{{ setting('site_title', 'IT CMS') }}</div>
                        <div class="site-subtitle">
                            {{ setting('site_tagline', 'Cổng thông tin đại học hiện đại, thân thiện và giàu trải nghiệm.') }}
                        </div>
                    </div>
                </a>

                <div class="header-actions ms-lg-auto">
                    <form class="search-pill" action="{{ url('/blog') }}" method="GET">
                        <input type="search" name="q" placeholder="Tìm kiếm tin tức, bài viết, thông báo...">
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </form>

                    <a href="{{ route('announcements') }}" class="btn btn-theme-outline">
                        <i class="bi bi-megaphone me-1"></i> Thông báo
                    </a>
                </div>
            </div>
        </div>

        <div class="nav-wrap">
            <div class="container container-wide">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler border-0 px-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    @php
                        use Platform\Core\Base\Models\Menu;

                        $menu = Menu::with([
                            'items.children' => function ($q) {
                                $q->orderBy('order');
                            },
                        ])
                            ->where('location', 'navbar')
                            ->where('is_active', true)
                            ->first();
                    @endphp
                    <div class="collapse navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            @foreach ($menu?->items?->whereNull('parent_id') ?? [] as $item)
                                @if ($item->children->count())
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="{{ $item->url ?: '#' }}"
                                            data-bs-toggle="dropdown">

                                            {{ $item->label }}
                                        </a>

                                        <ul class="dropdown-menu">
                                            @foreach ($item->children as $child)
                                                <li>
                                                    <a class="dropdown-item" href="{{ $child->url }}">
                                                        {{ $child->label }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $item->url }}">
                                            {{ $item->label }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    @if (isset($page))
        @include('theme::partials.breadcrumb')
    @endif
    <main class="site-content">
        @hasSection('sidebar')
                <div class="row g-4 mt-3 p-4">

                    <div class="col-lg-8">
                        @yield('content')
                    </div>

                    <div class="col-lg-4">
                        @yield('sidebar')
                    </div>

                </div>
            @else
                @yield('content')
            @endif
    </main>

    <footer class="site-footer mt-5" id="contact">
        <div class="container container-wide py-5">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand">
                        <img src="{{ asset('storage/' .setting('site_logo', '')) }}" alt="{{ setting('site_title', 'IT CMS') }}"
                            onerror="this.style.display='none'">
                        <div>
                            <div class="footer-title mb-1">{{ setting('site_title', 'IT CMS') }}</div>
                            <div class="text-soft">
                                {{ setting('site_tagline', 'Cổng thông tin hiện đại cho nhà trường.') }}</div>
                        </div>
                    </div>

                    <div class="footer-note">
                        {!! nl2br(
                            e(setting('site_description', 'Nơi cập nhật tin tức, đào tạo, tuyển sinh và hoạt động nổi bật của nhà trường.')),
                        ) !!}
                    </div>

                    <div class="mt-3 d-flex flex-wrap gap-2">
                        <a href="{{ url('/') }}" class="btn btn-theme">Trang chủ</a>
                        <a href="{{ route('announcements') }}" class="btn btn-theme-outline">Thông báo</a>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="footer-title">Liên kết nhanh</div>
                    @if (isset($quickFooterLinks) && $quickFooterLinks->count())
                        @foreach ($quickFooterLinks as $item)
                            <a class="footer-link" href="{{ $item->url ?: '#' }}">{{ $item->title }}</a>
                        @endforeach
                    @else
                        <a class="footer-link" href="{{ url('/blog') }}">Tin tức</a>
                        <a class="footer-link" href="{{ route('announcements') }}">Thông báo</a>
                    @endif
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="footer-title">Tổ chức</div>
                    @if (isset($organizationLinks) && $organizationLinks->count())
                        @foreach ($organizationLinks as $item)
                            <a class="footer-link" href="{{ $item->url ?: '#' }}">{{ $item->title }}</a>
                        @endforeach
                    @else
                        <a class="footer-link" href="#">Ban giám hiệu</a>
                        <a class="footer-link" href="#">Phòng ban</a>
                        <a class="footer-link" href="#">Khoa / Viện</a>
                    @endif
                </div>

                <div class="col-lg-2">
                    <div class="footer-title">Liên hệ</div>
                    <div class="footer-note">
                        @if (setting('site_address'))
                            <div class="mb-2"><i class="bi bi-geo-alt me-1"></i> {{ setting('site_address') }}
                            </div>
                        @endif
                        @if (setting('site_phone'))
                            <div class="mb-2"><i class="bi bi-telephone me-1"></i> {{ setting('site_phone') }}
                            </div>
                        @endif
                        @if (setting('site_email'))
                            <div><i class="bi bi-envelope me-1"></i> {{ setting('site_email') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div
                class="container container-wide py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div>© {{ date('Y') }} {{ setting('site_title', 'IT CMS') }}. All rights reserved.</div>
                <div>
                    <span class="me-2">Thiết kế theme mới</span>
                    <i class="bi bi-sparkles"></i>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
