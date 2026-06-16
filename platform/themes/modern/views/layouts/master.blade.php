<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', setting('site_title', 'IT CMS'))</title>

    @if (setting('site_favicon'))
        <link rel="icon" href="{{ asset('storage/' . setting('site_favicon')) }}">
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #4d0f76;
            --primary-2: #14b8a6;
            --accent: #f59e0b;
            --dark: #0f172a;
            --muted: #64748b;
            --bg: #f5f8fb;
            --card: #ffffff;
            --line: #e5e7eb;
            --shadow: 0 12px 30px rgba(15, 23, 42, .08);
            --radius: 22px;
        }

        html,
        body {
            overflow-x: hidden;
        }

        body {
            background: var(--bg);
            color: #0f172a;
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

        .section-title {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -.03em;
            margin-bottom: 18px;
            color: #0f172a;
        }

        .section-subtitle {
            color: var(--muted);
            margin-bottom: 0;
        }

        .card-soft {
            background: var(--card);
            border: 1px solid rgba(226, 232, 240, .8);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .hover-lift {
            transition: .25s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 38px rgba(15, 23, 42, .12);
        }

        .text-soft {
            color: var(--muted);
        }

        .badge-soft {
            background: rgba(20, 184, 166, .12);
            color: var(--primary);
            border: 1px solid rgba(20, 184, 166, .16);
        }

        .site-header {
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(226, 232, 240, .85);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-logo {
            width: 58px;
            height: 58px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-title {
            font-size: 20px;
            font-weight: 800;
            line-height: 1.15;
            color: var(--dark);
            margin: 0;
        }

        .brand-subtitle {
            color: var(--muted);
            font-size: 13px;
            margin: 2px 0 0;
        }

        .search-box {
            position: relative;
            width: min(420px, 100%);
        }

        .search-box input {
            width: 100%;
            height: 46px;
            border-radius: 999px;
            border: 1px solid #dbe4ee;
            padding: 0 52px 0 18px;
            background: #fff;
            outline: none;
            transition: .2s ease;
        }

        .search-box input:focus {
            border-color: rgba(20, 184, 166, .55);
            box-shadow: 0 0 0 4px rgba(20, 184, 166, .12);
        }

        .search-box button {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 34px;
            height: 34px;
            border: 0;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .top-links {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .top-links a {
            color: var(--muted);
            font-size: 14px;
            font-weight: 600;
        }

        .top-links a:hover {
            color: var(--primary);
        }

        .navbar-modern {
            background: linear-gradient(90deg, var(--primary), #0b5d57);
            box-shadow: 0 8px 24px rgba(15, 23, 42, .10);
        }

        .navbar-modern .nav-link {
            color: rgba(255, 255, 255, .92) !important;
            font-weight: 700;
            padding: 14px 16px !important;
            border-radius: 12px;
        }

        .navbar-modern .nav-link:hover,
        .navbar-modern .nav-link.active {
            background: rgba(255, 255, 255, .12);
            color: #fff !important;
        }

        .navbar-modern .dropdown-menu {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 18px 35px rgba(15, 23, 42, .12);
            padding: 10px;
        }

        .navbar-modern .dropdown-item {
            border-radius: 12px;
            padding: 10px 14px;
        }

        .navbar-modern .dropdown-item:hover {
            background: #f1f5f9;
        }

        .page-breadcrumb {
            background: #fff;
            border-bottom: 1px solid var(--line);
            padding: 10px 0;
        }

        .page-breadcrumb a {
            color: #334155;
        }

        .page-breadcrumb .active {
            color: var(--primary);
            font-weight: 700;
        }

        .site-footer {
            background: #0b1220;
            color: rgba(255, 255, 255, .82);
            margin-top: 48px;
        }

        .site-footer a {
            color: rgba(255, 255, 255, .82);
        }

        .footer-title {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 14px;
            color: #fff;
        }

        .footer-links {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .08);
            margin-top: 18px;
            padding-top: 18px;
            font-size: 14px;
            color: rgba(255, 255, 255, .65);
        }

        .btn-modern {
            border-radius: 999px;
            font-weight: 700;
            padding: 10px 18px;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            border: 0;
            color: #fff;
        }

        .btn-primary-modern:hover {
            color: #fff;
            filter: brightness(.97);
        }

        .btn-outline-modern {
            border: 1px solid rgba(255, 255, 255, .22);
            color: #fff;
            background: rgba(255, 255, 255, .08);
        }

        .btn-outline-modern:hover {
            background: rgba(255, 255, 255, .14);
            color: #fff;
        }

        .menu-home-icon {
            width: 22px;
            height: 22px;
            object-fit: contain;
            vertical-align: middle;
        }

        .post-content {
            overflow-wrap: break-word;
        }

        .post-content img {
            max-width: 100% !important;
            height: auto !important;
            display: block;
            margin: 10px auto;
        }

        .post-content table {
            width: 100% !important;
            display: block;
            overflow-x: auto;
        }

        .post-content iframe,
        .post-content video {
            max-width: 100% !important;
        }

        .post-content * {
            max-width: 100%;
        }

        .header-user-area {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100%;
        }

        .login-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--primary), var(--primary-2));
            color: #fff;
            font-weight: 700;
            transition: .3s;
        }

        .login-btn:hover {
            color: #fff;
            transform: translateY(-2px);
        }

        .user-dropdown {
            position: relative;
        }

        .user-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #0f172a;
            font-weight: 600;
        }

        .user-toggle i.bi-person-circle {
            font-size: 28px;
            color: var(--primary);
        }

        .user-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            min-width: 220px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .12);
            padding: 10px;
            display: none;
            z-index: 999;
        }

        .user-dropdown:hover .user-menu {
            display: block;
        }

        .user-menu a,
        .user-menu button {
            width: 100%;
            border: none;
            background: none;
            text-align: left;
            padding: 10px 12px;
            border-radius: 10px;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-dropdown::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 100%;
            height: 12px;
        }

        .user-menu a:hover,
        .user-menu button:hover {
            background: #f1f5f9;
        }

        .navbar-modern .dropdown-menu {
            margin-top: 0;
            display: block;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: .25s ease;
        }

        .navbar-modern .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    <header class="site-header">
        <div class="container py-3">
            <div class="row align-items-center g-3">
                <div class="col-lg-4 col-md-12">
                    <a href="{{ url('/') }}" class="brand-wrap text-decoration-none">
                        @if (setting('site_logo'))
                            <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="Logo" class="brand-logo">
                        @else
                            <div class="brand-logo rounded-circle d-flex align-items-center justify-content-center"
                                style="background:linear-gradient(135deg,var(--primary),var(--primary-2));color:#fff;font-weight:800;">
                                NTU
                            </div>
                        @endif
                        <div>
                            <h1 class="brand-title">{{ setting('site_title', 'IT CMS') }}</h1>
                            <p class="brand-subtitle mb-0">Giao diện modern cho cổng thông tin</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-5 col-md-7">
                    <form action="{{ url('/search') }}" method="GET" class="search-box mx-lg-auto">
                        <input type="search" name="q" placeholder="Tìm kiếm tin tức, thông báo, tuyển sinh...">
                        <button type="submit" aria-label="Tìm kiếm">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <div class="col-lg-3 col-md-5">
                    <div class="header-user-area">

                        @guest
                            <a href="{{ route('customer.login') }}" class="login-btn">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Đăng nhập
                            </a>
                        @else
                            <div class="user-dropdown">

                                <a href="#" class="user-toggle">
                                    <i class="bi bi-person-circle"></i>

                                    <span>
                                        Xin chào,
                                        <strong>{{ auth()->user()->first_name }}</strong>
                                    </span>

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
        </div>

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

        <nav class="navbar navbar-expand-lg navbar-dark navbar-modern">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">

                    <ul class="navbar-nav me-auto">

                        @foreach ($menu?->items?->whereNull('parent_id')->sortBy('order') ?? [] as $item)
                            @if ($item->children->count())
                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="{{ $item->url ?: '#' }}"
                                        data-bs-toggle="dropdown">

                                        {{ $item->label }}

                                    </a>

                                    <ul class="dropdown-menu">

                                        @foreach ($item->children->sortBy('order') as $child)
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

                                        @if ($item->url == '/')
                                            <i class="fa-solid fa-house me-1"></i>
                                        @endif

                                        {{ $item->label }}

                                    </a>

                                </li>
                            @endif
                        @endforeach

                    </ul>

                </div>

            </div>
        </nav>
    </header>

    @if (isset($page))
        <div class="page-breadcrumb">
            <div class="container">
                @include('theme::partials.breadcrumb')
            </div>
        </div>
    @endif

    <main class="site-content py-4">
        <div class="container">
            @yield('before-content')

            @hasSection('sidebar')
                <div class="row g-4">
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
        </div>
    </main>

    <footer class="site-footer">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        @if (setting('site_logo'))
                            <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="Logo"
                                style="width:52px;height:52px;object-fit:contain;">
                        @endif
                        <div>
                            <h5 class="footer-title mb-1">{{ setting('site_title', 'IT CMS') }}</h5>
                            <p class="mb-0 text-white-50">Thiết kế theme hiện đại, gọn và dễ mở rộng.</p>
                        </div>
                    </div>

                    @if (!empty($footerSetting) && $footerSetting)
                        <div class="small text-white-50">
                            {!! nl2br(e($footerSetting->description ?? '')) !!}
                        </div>
                    @endif
                </div>

                <div class="col-lg-3 col-md-4">
                    <h5 class="footer-title">Liên kết nhanh</h5>
                    <ul class="footer-links">
                        @if (!empty($quickFooterLinks) && $quickFooterLinks->count())
                            @foreach ($quickFooterLinks as $item)
                                <li><a href="{{ $item->url ?: '#' }}">{{ $item->title }}</a></li>
                            @endforeach
                        @else
                            <li><a href="{{ url('/') }}">Trang chủ</a></li>
                            <li><a href="{{ url('/blog') }}">Tin tức</a></li>
                            <li><a href="{{ url('/lien-he') }}">Liên hệ</a></li>
                        @endif
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h5 class="footer-title">Tổ chức</h5>
                    <ul class="footer-links">
                        @if (!empty($organizationLinks) && $organizationLinks->count())
                            @foreach ($organizationLinks as $item)
                                <li><a href="{{ $item->url ?: '#' }}">{{ $item->title }}</a></li>
                            @endforeach
                        @else
                            <li><a href="#">Phòng ban</a></li>
                            <li><a href="#">Khoa/Viện</a></li>
                        @endif
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-title">Kết nối</h5>
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="#" class="btn btn-outline-modern btn-modern"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-modern btn-modern"><i
                                class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="btn btn-outline-modern btn-modern"><i
                                class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                    <div>© {{ date('Y') }} {{ setting('site_title', 'IT CMS') }}. All rights reserved.</div>
                    <div>Powered by modern theme</div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    @stack('scripts')
</body>

</html>
