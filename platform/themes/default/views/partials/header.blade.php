@php
    use Platform\Core\Base\Services\MenuService;

    $headerMenu = MenuService::getByLocation('header');
@endphp

<div class="site-header">

    <div class="container">

        <div class="logo-area">

            @if (setting('site_logo'))
                <img src="{{ asset('storage/' .setting('site_logo')) }}" alt="{{ setting('site_title') }}">
            @endif
            <div>

                <div class="site-title">
                    {{ setting('site_title') }}
                </div>

                <div class="site-subtitle">
                    {{ setting('site_slogan') }}
                </div>

            </div>

        </div>

        <div class="header-right">

            <form action="{{ route('search') }}" method="GET" class="search-box">

                <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm kiếm...">

                <button type="submit" class="search-btn">
                    <i class="bi bi-search"></i>
                </button>

            </form>

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
