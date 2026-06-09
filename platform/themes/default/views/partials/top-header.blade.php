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

            <span>|</span>

            <a href="#">
                English
            </a>

        </div>

        {{-- RIGHT --}}
        <div class="topbar-right">

            @foreach($topbar?->items ?? [] as $item)

                <a href="{{ $item->url }}">
                    {{ $item->label }}
                </a>

            @endforeach

        </div>

    </div>

</div>
