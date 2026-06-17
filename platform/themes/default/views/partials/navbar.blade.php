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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @foreach ($menu?->items?->whereNull('parent_id') ?? [] as $item)
                    @if ($item->children->count())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
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

                                @if ($item->url == '/')
                                    <img src="{{ asset('themes/images/home.png') }}" alt="Home"
                                        class="menu-home-icon me-1">
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
