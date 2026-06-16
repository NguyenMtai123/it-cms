@php
    use Platform\Core\Base\Services\MenuService;

    $topbar = MenuService::getByLocation('topbar');
@endphp

<div class="topbar">

    <div class="container">

        {{-- LEFT --}}
        <div class="topbar-left">

            <a href="#">
                <i class="bi bi-globe"></i>
                Tiếng Việt
            </a>

            {{-- <span>|</span>

            <a href="#">
                English
            </a> --}}

        </div>

        {{-- RIGHT --}}
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

                        <i class="bi bi-chevron-down small"></i>

                    </a>

                    <div class="user-menu">

                        <a href="{{ route('customer.profile') }}">
                            <i class="bi bi-person"></i>
                            Hồ sơ cá nhân
                        </a>

                        {{-- <a href="#">
                            <i class="bi bi-key"></i>
                            Đổi mật khẩu
                        </a> --}}

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
<style>
    .user-dropdown {
    position: relative;
}

.user-toggle {
    color: #222;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}

.user-toggle:hover {
    color: #0d6efd;
}

.user-menu {
    position: absolute;
    top: 100%;
    right: 0;

    min-width: 220px;

    background: #fff;
    border-radius: 10px;

    box-shadow:
        0 10px 30px rgba(0,0,0,.12);

    padding: 8px 0;

    opacity: 0;
    visibility: hidden;

    transform: translateY(10px);

    transition: .25s;
    z-index: 9999;
}

.user-dropdown:hover .user-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.user-menu a,
.user-menu button {

    width: 100%;

    border: none;
    background: none;

    text-align: left;

    padding: 10px 16px;

    display: flex;
    align-items: center;

    gap: 10px;

    color: #333;
    font-size: 14px;
}

.user-menu a:hover,
.user-menu button:hover {

    background: #f5f7fa;
    color: #0d6efd;
}

.user-menu form {
    margin: 0;
}
</style>
