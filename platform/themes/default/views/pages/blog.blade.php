@extends('theme::layouts.master')

@section('title', 'Blog')

@section('content')

<div class="card content-card mb-4">
    <div class="card-body p-4">
        <h1 class="section-title mb-2">Tin tức & Bài viết</h1>
        <p class="text-soft mb-0">
            Cập nhật bài viết, hướng dẫn, hoạt động và nội dung truyền thông của khoa.
        </p>
    </div>
</div>

<div class="row g-4">

    @forelse($posts as $post)

        <div class="col-12">
            <div class="card post-card">
                <div class="row g-0">

                    {{-- IMAGE --}}
                    <div class="col-md-4">
                        @if(!empty($post->image))
                            <img src="{{ asset($post->image) }}"
                                 class="w-100 h-100"
                                 style="object-fit:cover; min-height:220px;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center h-100"
                                 style="min-height:220px;">
                                <i class="bi bi-image text-muted fs-1"></i>
                            </div>
                        @endif
                    </div>

                    {{-- CONTENT --}}
                    <div class="col-md-8">
                        <div class="card-body p-4">

                            {{-- CATEGORY + TAG --}}
                            <div class="d-flex gap-2 flex-wrap mb-2">

                                @if(optional($post->category)->name)
                                    <span class="badge text-bg-primary">
                                        {{ $post->category->name }}
                                    </span>
                                @endif

                                @if($post->tags && $post->tags->count() > 0)
                                    <span class="badge text-bg-light text-dark">
                                        #{{ $post->tags->first()->name }}
                                    </span>
                                @endif

                            </div>

                            {{-- TITLE --}}
                            <h4 class="fw-bold mb-2 clamp-2">
                                <a href="{{ url('/blog/' . $post->slug) }}"
                                   class="text-dark text-decoration-none">
                                    {{ $post->title }}
                                </a>
                            </h4>

                            {{-- DESCRIPTION --}}
                            <p class="text-soft clamp-3 mb-3">
                                {{ $post->description }}
                            </p>

                            {{-- FOOTER --}}
                            <div class="d-flex justify-content-between align-items-center">

                                <small class="text-soft">
                                    {{ optional($post->published_at)->format('d/m/Y') }}
                                </small>

                                <a href="{{ url('/blog/' . $post->slug) }}"
                                   class="btn btn-primary btn-sm">
                                    Đọc tiếp
                                </a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    @empty

        <div class="col-12">
            <div class="alert alert-light border mb-0">
                Chưa có bài viết.
            </div>
        </div>

    @endforelse

</div>

{{-- PAGINATION --}}
@if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endif

@endsection
