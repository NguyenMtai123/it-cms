@if(isset($page))

<div class="page-breadcrumb">

    <div class="container">

        @if($page->parent)

            <a href="{{ $page->parent->url }}">
                {{ $page->parent->title }}
            </a>

            <span>/</span>

            <span class="active">
                {{ $page->title }}
            </span>

        @else

            <span class="active">
                {{ $page->title }}
            </span>

        @endif

    </div>

</div>

@endif
