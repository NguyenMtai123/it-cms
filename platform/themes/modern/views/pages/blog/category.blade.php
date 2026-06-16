@extends('theme::layouts.master')

@section('title', $category->name)

@section('content')

<div class="category-page">

    <div class="category-header">
        {{ $category->name }}
    </div>

    @forelse($posts as $post)

        <div class="category-post">

            <div class="row">

                <div class="col-md-3">

                    <a href="{{ url('/blog/'.$post->slug) }}">

                        <img
                            src="{{ asset($post->image) }}"
                            class="post-thumb">

                    </a>

                </div>

                <div class="col-md-9">

                    <div class="post-category">
                        {{ $category->name }}
                    </div>

                    <h3 class="post-title">

                        <a href="{{ url('/blog/'.$post->slug) }}">
                            {{ $post->title }}
                        </a>

                    </h3>

                    <div class="post-meta">

                        <span>
                            <i class="bi bi-person"></i>
                            {{ $post->author?->username ?? 'Văn Phòng Trường ĐHNT' }}
                        </span>

                        <span class="ms-auto">
                            {{ $post->created_at->diffForHumans() }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="alert alert-light border">
            Chưa có bài viết.
        </div>

    @endforelse

    <div class="mt-4">

        {{ $posts->links() }}

    </div>

</div>

@endsection

@section('sidebar')
    @include('theme::partials.blog-sidebar')
@endsection
<style>
    .category-header{
    font-size:25px;
    font-weight:300;
    margin-bottom:30px;
}

.category-post{
    background:#fff;
    border:1px solid #e5e7eb;
    padding:14px;
    margin-bottom:25px;
}

.post-thumb{
    width:100%;
    height:180px;
    object-fit:cover;
}

.post-category{
    color:#ff4b4b;
    font-size:15px;
    margin-bottom:10px;
}

.post-title{
    font-size:18px;
    line-height:1.4;
    font-weight:400;
    margin-bottom:40px;
}

.post-title a{
    color:#333;
    text-decoration:none;
}

.post-title a:hover{
    color:#0d6efd;
}

.post-meta{
    display:flex;
    align-items:center;
    color:#6b7280;
    font-size:15px;
}

.post-meta i{
    margin-right:8px;
}

.pagination{
    justify-content:center;
}

.page-link{
    color:#0d6efd;
}

.page-item.active .page-link{
    background:#0d6efd;
    border-color:#0d6efd;
}
</style>
