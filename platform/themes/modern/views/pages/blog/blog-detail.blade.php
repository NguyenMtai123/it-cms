@extends('theme::layouts.master')
@php

    $content = preg_replace('/<li>(\s|&nbsp;)*<\/li>/i', '', $post->content);

@endphp
@section('title', $post->title)

@section('content')

    <div class="news-detail-card">

        <div class="news-header">

            <h1 class="news-title">
                {{ $post->title }}
            </h1>

            <div class="news-meta">

                <span>
                    <i class="bi bi-person"></i>
                    {{ $post->author?->username ?? 'Văn Phòng Trường ĐHNT' }}
                </span>

                <span>
                    <i class="bi bi-calendar3"></i>
                    {{ $post->created_at->format('d/m/Y') }}
                </span>

                <span>
                    <i class="bi bi-eye"></i>
                    {{ number_format($post->views) }}
                </span>

                <span>
                    <i class="bi bi-chat"></i>
                    0
                </span>

            </div>

        </div>

        <div class="post-content news-content">
            {!! $content !!}
        </div>

    </div>
    <div class="post-navigation">

    @if($previousPost)

        <a href="{{ url('/blog/'.$previousPost->slug) }}"
           class="nav-post nav-prev">

            <div class="nav-arrow">
                <i class="bi bi-chevron-left"></i>
            </div>

            <div class="nav-content">

                <div class="nav-label">
                    Bài viết trước
                </div>

                <div class="nav-title">
                    {{ $previousPost->title }}
                </div>

            </div>

        </a>

    @else

        <div></div>

    @endif


    @if($nextPost)

        <a href="{{ url('/blog/'.$nextPost->slug) }}"
           class="nav-post nav-next">

            <div class="nav-content text-end">

                <div class="nav-label">
                    Bài tiếp theo
                </div>

                <div class="nav-title">
                    {{ $nextPost->title }}
                </div>

            </div>

            <div class="nav-arrow">
                <i class="bi bi-chevron-right"></i>
            </div>

        </a>

    @endif

</div>

@endsection

@section('sidebar')
    @include('theme::partials.blog-sidebar')
@endsection
<style>
    .sidebar-card {
        border: 1px solid #e5e7eb;
        border-radius: 0;
        box-shadow: none;
    }

    .sidebar-card h4 {
        font-size: 20px;
        font-weight: 700;
    }

    .sidebar-card a {
        transition: .2s;
    }

    .sidebar-card a:hover {
        color: #0d6efd;
    }

    .news-detail-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        padding: 32px;
        margin-bottom: 20px;
    }

    .news-title {
        font-size: 25px;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 20px;
    }

    .news-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        align-items: center;
        margin-bottom: 25px;
        font-size: 15px;
        color: #666;
    }

    .news-meta span {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .news-meta i {
        font-size: 16px;
        color: #222;
    }

    .news-image-wrap {
        text-align: center;
        margin-bottom: 30px;
    }

    .news-image {
        max-width: 100%;
    }

    .news-content {
        max-width: 800px;
        /* quan trọng */
        margin: 0 auto;
        /* căn giữa */
    }

    .news-content p {
        font-size: 15px;
        line-height: 1.9;
        margin-bottom: 20px;
    }

    .news-content img {
        display: block;
        margin: 25px auto;
    }

    .news-content h2,
    .news-content h3,
    .news-content h4 {
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .news-content h2 {
        font-size: 20px;
    }

    .news-content h3 {}

    .news-content h4 {}

    .news-content ul:empty,
    .news-content li:empty {
        display: none;
    }
    .post-navigation{
    display:flex;
    justify-content:space-between;
    gap:20px;
    margin-top:25px;
}

.nav-post{
    flex:1;
    background:#fff;
    border:1px solid #e5e7eb;
    padding:25px;
    display:flex;
    align-items:center;
    gap:18px;
    color:#222;
    text-decoration:none;
    transition:.25s;
}

.nav-post:hover{
    border-color:#0d6efd;
    color:#0d6efd;
}

.nav-arrow{
    width:60px;
    height:60px;
    background:#d9d9d9;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.nav-arrow i{
    font-size:30px;
    color:#fff;
}

.nav-content{
    flex:1;
}

.nav-label{
    font-size:14px;
    font-weight:700;
    margin-bottom:8px;
}

.nav-title{
    font-size:16px;
    line-height:1.6;
    color:#444;
}

.nav-next{
    justify-content:flex-end;
}

@media(max-width:768px){

    .post-navigation{
        flex-direction:column;
    }

}
</style>
