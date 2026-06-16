<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        a {
            text-decoration: none;
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

        .search-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
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
            font-size: 14px;
            font-weight: 400;
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
            padding: 13px 13px !important;
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

        .auth-page {
            min-height: 100vh;
            padding: 32px 0;

            background:
                linear-gradient(135deg,
                    #0f3f74,
                    #1d63b5);

            position: relative;
        }

        .auth-overlay {
            position: absolute;
            inset: 0;

            background:
                radial-gradient(circle at top right,
                    rgba(255, 255, 255, .15),
                    transparent 40%);
        }

        .auth-card {

            background: #fff;

            border: none;

            border-radius: 24px;

            overflow: hidden;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, .15);
        }

        .auth-header {

            text-align: center;

            padding: 35px 30px 15px;
        }

        .auth-logo {
            width: 50px;
            margin-bottom: 15px;
        }

        .auth-title {
            font-size: 25px;
            font-weight: 700;
            color: #0f3f74;
        }

        .auth-subtitle {
            color: #64748b;
            font-size: 14px;
        }

        .auth-body {
            padding: 0px 35px 35px;
        }

        .form-icon {
            position: relative;
        }

        .form-icon i {

            position: absolute;

            left: 15px;

            top: 50%;

            transform: translateY(-50%);

            color: #94a3b8;
        }

        .form-icon input {

            padding-left: 45px;

            height: 48px;

            border-radius: 12px;
        }

        .btn-auth {

            height: 50px;

            border: none;

            border-radius: 12px;

            font-weight: 600;

            background:
                linear-gradient(135deg,
                    #0f3f74,
                    #1d63b5);

            color: #fff;

            transition: .25s;
        }

        .btn-auth:hover {

            transform: translateY(-2px);

            box-shadow:
                0 10px 20px rgba(29, 99, 181, .3);
        }

        .auth-links {

            margin-top: 20px;

            text-align: center;
        }

        .auth-links a {
            color: #0f3f74;
            font-weight: 600;
        }

        .auth-divider {

            text-align: center;

            margin: 10px 0;

            color: #94a3b8;
        }
        .profile-avatar{
    width:90px;
    height:90px;
    border-radius:50%;
    margin:auto;
    margin-bottom:15px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:32px;
    font-weight:700;

    color:#fff;

    background:linear-gradient(
        135deg,
        #0f3f74,
        #1d63b5
    );
}

.nav-pills .nav-link{
    border-radius:10px;
}

.nav-pills .nav-link.active{
    background:#0f3f74;
}
.back-home{

    color:#fff;

    font-weight:600;

    font-size:15px;
}

.back-home:hover{
    color:#fff;
    opacity:.9;
}
    </style>
</head>

<body class="d-flex flex-column min-vh-100" style="background:#f5f7fb">
    {{-- @include('theme::partials.top-header') --}}
    {{-- @include('theme::partials.header') --}}
    {{-- @include('theme::partials.navbar') --}}
    {{-- @if (isset($sliders))
        @include('theme::partials.slider')
    @endif --}}
    <main class="auth-page">

        <div class="auth-overlay"></div>

        <div class="container position-relative">

            <div class="row justify-content-center">

                <div class="col-md-7 col-lg-5">
                    @if(session('success'))
                        <div class="alert alert-success shadow-sm border-0 rounded-3 mb-4">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger shadow-sm border-0 rounded-3 mb-4">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @yield('content')

                </div>

            </div>

        </div>

    </main>
    {{-- @include('theme::partials.footer') --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>

</html>
