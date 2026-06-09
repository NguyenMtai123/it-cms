@php
    use Platform\Core\Base\Services\MenuService;

    $headerMenu = MenuService::getByLocation('header');
@endphp

<div class="site-header">

    <div class="container">

        <div class="logo-area">

            <img src="{{ asset('themes/images/logo.png') }}">

            <div>

                <div class="site-title">
                    TRƯỜNG ĐẠI HỌC NHA TRANG
                </div>

                <div class="site-subtitle">
                    UPM UNIVERSITY PERFORMANCE METRICS ★★★★★
                </div>

            </div>

        </div>

<div class="header-right">

            <div class="search-box">

                <input type="text" placeholder="Tìm kiếm...">

                <i class="bi bi-search"></i>

            </div>

            <div class="header-links">

                @foreach ($headerMenu?->items ?? [] as $item)
                    <a href="{{ $item->url }}">
                        {{ $item->label }}

                       <i class="bi bi-caret-left-fill small"></i>
                    </a>
                @endforeach

            </div>

        </div>

    </div>

</div>
