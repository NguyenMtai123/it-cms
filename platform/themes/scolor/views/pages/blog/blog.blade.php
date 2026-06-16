@extends('theme::layouts.master')

@section('title', 'Tin tức')

@section('content')

<div class="category-title">
    Tin tức
</div>

@forelse($posts as $post)

<div class="news-item">

    <div class="news-thumb">

        <a href="{{ url('/blog/'.$post->slug) }}">

            <img src="{{ asset('storage/' .$post->image) }}">

        </a>

    </div>

    <div class="news-info">

        <div class="news-category">
            {{ $post->categories->first()->name ?? 'Tin tức chung' }}
        </div>

        <h3 class="news-name">

            <a href="{{ url('/blog/'.$post->slug) }}">
                {{ $post->title }}
            </a>

        </h3>

        <div class="news-meta">

            <span>
                <i class="bi bi-person"></i>
                {{ $post->author?->username ?? 'Văn Phòng Trường ĐHNT' }}
            </span>

            <span>
                <i class="bi bi-clock"></i>

                {{ $post->created_at->diffForHumans() }}
            </span>

        </div>

        <a
            href="{{ url('/blog/'.$post->slug) }}"
            class="read-more">

            Đọc tiếp
            <i class="bi bi-arrow-right"></i>

        </a>

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
@section('sidebar')
    @include('theme::partials.blog-sidebar')
@endsection
@endsection


<style>
.category-title{
    font-size:18px;
    color:#ef4444;
    margin-bottom:25px;
}

.news-item{
    background:#fff;
    border:1px solid #e5e7eb;
    padding:20px;
    margin-bottom:30px;

    display:flex;
    gap:30px;
}

.news-thumb{
    width:280px;
    flex-shrink:0;
}

.news-thumb img{
    width:100%;
    height:180px;
    object-fit:cover;
}

.news-info{
    flex:1;
}

.news-category{
    color:#ff5b5b;
    font-size:14px;
    margin-bottom:10px;
}

.news-name{
    font-size:18px;
    font-weight:500;
    margin-bottom:25px;
}

.news-name a{
    color:#222;
}

.news-name a:hover{
    color:#0d6efd;
}

.news-meta{
    display:flex;
    gap:25px;
    color:#666;
    margin-bottom:20px;
}

.news-meta span{
    display:flex;
    align-items:center;
    gap:8px;
}

.read-more{
    display:inline-flex;
    align-items:center;
    gap:8px;

    color:#004a99;
    font-weight:600;
}

.read-more:hover{
    color:#ef4444;
}

@media(max-width:768px){

    .news-item{
        flex-direction:column;
    }

    .news-thumb{
        width:100%;
    }

}
</style>
