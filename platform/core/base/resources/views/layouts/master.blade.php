<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'IT CMS Admin')</title>
    @if (setting('site_favicon'))
        <link rel="icon" href="{{ asset(setting('site_favicon')) }}">
    @endif

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- NAVBAR --}}
        @include('base::partials.navbar')

        {{-- SIDEBAR --}}
        @include('base::partials.sidebar')

        {{-- CONTENT --}}
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    @yield('page-header')
                </div>
            </section>

            <section class="content">
                <div class="container-fluid mb-2">
                    @yield('content')
                </div>
            </section>

        </div>

        {{-- FOOTER --}}
        <footer class="main-footer">
            <strong>IT CMS</strong> © {{ date('Y') }}
        </footer>

    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng xuất</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Bạn có muốn đăng xuất không?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    Hủy
                </button>

                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        Đăng xuất
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- JS -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
    setTimeout(function () {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(function (alert) {
            alert.style.transition = "0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
</script>
    @stack('scripts');
    @include('media::components.scripts')
</body>

</html>
