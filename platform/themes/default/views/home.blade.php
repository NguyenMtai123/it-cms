@extends('theme::layouts.master')

@section('title', 'Home')

@section('content')

<div class="p-4 mb-4 bg-white rounded-4 shadow-sm">
    <h1 class="fw-bold mb-2">Welcome to IT CMS</h1>
    <p class="text-muted mb-0">Laravel Modular CMS - Blog System</p>
</div>

{{-- FEATURED POSTS --}}
<h4 class="mb-3 fw-bold">Bài viết nổi bật</h4>

<div class="row g-3 mb-4">
    @foreach($featuredPosts as $post)
        <div class="col-md-6">
            <div class="card post-card shadow-sm h-100 d-flex flex-column">

                @if($post->image)
                    <img src="{{ asset($post->image) }}"
                         class="card-img-top"
                         style="height:220px; object-fit:cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:220px;">
                        <i class="bi bi-image text-muted fs-1"></i>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold">{{ $post->title }}</h5>
                    <p class="text-muted mb-3" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                        {{ $post->description }}
                    </p>

                    <div class="mt-auto">
                        <a href="{{ url('/blog/' . $post->slug) }}" class="btn btn-primary btn-sm">
                            Đọc tiếp
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

{{-- LATEST POSTS --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0 fw-bold">Bài viết mới nhất</h4>
</div>

<div class="row g-3">
    @foreach($latestPosts as $post)
        <div class="col-md-6">
            <div class="card post-card shadow-sm h-100 d-flex flex-column">

                @if($post->image)
                    <img src="{{ asset($post->image) }}"
                         class="card-img-top"
                         style="height:220px; object-fit:cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:220px;">
                        <i class="bi bi-image text-muted fs-1"></i>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="fw-bold">{{ $post->title }}</h5>
                    <p class="text-muted mb-3" style="display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                        {{ $post->description }}
                    </p>

                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            {{ optional($post->published_at)->format('d/m/Y') }}
                        </small>
                        <a href="{{ url('/blog/' . $post->slug) }}" class="btn btn-outline-primary btn-sm">
                            Chi tiết
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $latestPosts->links() }}
</div>

<hr class="my-4">


@endsection
