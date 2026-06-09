<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', setting('site_title', 'IT CMS'))</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #0d6efd;
            --dark: #0f172a;
            --muted: #64748b;
            --bg: #f4f7fb;
            --card-radius: 18px;
        }

        body {
            background: var(--bg);
            color: #111827;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .site-content {
            min-height: 70vh;
        }

        .content-card,
        .sidebar-card,
        .post-card,
        .feature-card {
            border: 0;
            border-radius: var(--card-radius);
            box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
            overflow: hidden;
        }

        .post-card,
        .feature-card {
            transition: .25s ease;
        }

        .post-card:hover,
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 38px rgba(15, 23, 42, .10);
        }

        .section-title {
            font-weight: 700;
            letter-spacing: -.02em;
        }

        .text-soft {
            color: var(--muted);
        }

        .post-thumb {
            aspect-ratio: 16 / 9;
            object-fit: cover;
            width: 100%;
        }

        .badge-soft {
            background: rgba(13, 110, 253, .10);
            color: var(--primary);
            border: 1px solid rgba(13, 110, 253, .12);
        }

        .hero {
            background: linear-gradient(135deg, #0f172a 0%, #1d4ed8 100%);
            color: white;
            border-radius: 28px;
            overflow: hidden;
            position: relative;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="none" viewBox="0 0 200 200"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.18)"/><circle cx="60" cy="40" r="1" fill="rgba(255,255,255,0.16)"/><circle cx="100" cy="70" r="1" fill="rgba(255,255,255,0.14)"/><circle cx="150" cy="30" r="1" fill="rgba(255,255,255,0.18)"/><circle cx="180" cy="90" r="1" fill="rgba(255,255,255,0.16)"/></svg>');
            opacity: .45;
            pointer-events: none;
        }

        .hero>* {
            position: relative;
            z-index: 1;
        }

        .footer {
            background: #0b1220;
            color: rgba(255, 255, 255, .85);
        }

        .footer a {
            color: rgba(255, 255, 255, .85);
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

        /* =========================
   TOPBAR
========================= */

        .topbar {
            height: 30px;
            background: #f7f7f7;
            border-bottom: 1px solid #e5e7eb;
            font-size: 13px;
        }

        .topbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .topbar-left img {
            width: 24px;
        }

        .topbar-right {
            display: flex;
            gap: 15px;
        }

        .topbar-right a {
            color: #222;
            font-weight: 500;
        }

        /* =========================
   HEADER
========================= */

        .site-header {
            background: #fff;
            padding: 15px 0;
        }

        .site-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-area img {
            height: 90px;
        }

        .site-title {
            font-size: 22px;
            font-weight: 700;
            color: #215a9b;
        }

        .site-subtitle {
            color: #d05c5c;
            font-size: 15px;
        }

        /* =========================
   SEARCH
========================= */

        .search-box {
            width: 250px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            height: 38px;
            border-radius: 30px;
            padding: 0 55px 0 20px;
            border: 1px solid #e5e7eb;
            background: #f5f5f5;
            outline: none;
        }

        .search-box i {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 22px;
            color: #666;
            cursor: pointer;
        }

        .header-right {
            width: 420px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        /* =========================
   HEADER LINKS
========================= */

        .header-links {
            width: 100%;
            margin-top: 15px;
            display: flex;
            justify-content: flex-end;
            gap: 5px;
            flex-wrap: wrap;
        }

        .header-links a {
            color: #333;
            font-size: 13px;
        }

        /* =========================
   NAVBAR
========================= */

        .navbar {
            background: #004a99 !important;
            padding: 0;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 16px;
            font-weight: 600;
            padding: 16px 18px !important;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, .12);
        }

        .navbar-nav .active {
            background: #0077cc;
        }

        .dropdown-menu {
            border: none;
            border-radius: 5px;
            min-width: 280px;
        }

        .dropdown-item {
            padding: 12px 20px;
        }

        .dropdown-item:hover {
            background: #f3f4f6;
        }

        /* =========================
   DROPDOWN HOVER
========================= */

        .navbar .dropdown {
            position: relative;
        }

        .navbar .dropdown-menu {
            display: block;
            opacity: 0;
            visibility: hidden;
            transform: translateY(8px);
            transition: all .25s ease;
            margin-top: 0;
        }

        .navbar .dropdown:hover>.dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Mũi tên dropdown */
        .navbar .dropdown-toggle::after {
            margin-left: 6px;
        }

        /* Giữ màu khi hover */
        .navbar .dropdown:hover>.nav-link {
            background: rgba(255, 255, 255, .12);
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
    </style>

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">
    @include('theme::partials.top-header')
    @include('theme::partials.header')
    @include('theme::partials.navbar')
    @if (isset($sliders))
        @include('theme::partials.slider')
    @endif

    <main class="site-content py-4 py-lg-5">
        <div class="container">
            @yield('before-content')

            <div class="row g-4 mt-3">
                <div class="col-lg-8">
                    @yield('content')
                </div>

                <div class="col-lg-4">
                    @include('theme::partials.sidebar')
                </div>
            </div>
        </div>
    </main>

    @include('theme::partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
