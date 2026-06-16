@extends('theme::layouts.master')

@section('title', 'Tìm kiếm')

@section('content')

<div class="search-page">

    <h2 class="search-title">
        Kết quả tìm kiếm
    </h2>

    <form action="{{ route('search') }}" method="GET">

        <div class="search-large">

            <input
                type="text"
                name="q"
                value="{{ $keyword }}"
                placeholder="Nhập từ khóa tìm kiếm...">

            <button type="submit">
                <i class="bi bi-search"></i>
            </button>

        </div>

    </form>

    @if($keyword)
        <div class="result-count">
            Tìm thấy <strong>{{ $posts->total() }}</strong>
            kết quả cho từ khóa:
            <strong>"{{ $keyword }}"</strong>
        </div>
    @endif

    @forelse($posts as $post)

        <div class="search-item">

            <a href="{{ url('/blog/' . $post->slug) }}">
                <h4>{{ $post->title }}</h4>
            </a>

            @if($post->description)
                <p>
                    {{ \Illuminate\Support\Str::limit(strip_tags($post->description), 200) }}
                </p>
            @endif

        </div>

    @empty

        <div class="alert alert-warning mt-4">
            Không tìm thấy kết quả phù hợp.
        </div>

    @endforelse

    <div class="mt-4">
        {{ $posts->links() }}
    </div>

</div>

@endsection

@push('styles')

<style>

.search-page{
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 2px 12px rgba(0,0,0,.05);
}

.search-title{
    color:#ef4444;
    font-size:25px;
    font-weight:700;
    margin-bottom:20px;
}

.search-large{
    display:flex;
    border:1px solid #ddd;
    border-radius:8px;
    overflow:hidden;
}

.search-large input{
    flex:1;
    border:none;
    height:55px;
    padding:0 20px;
    outline:none;
}

.search-large button{
    width:70px;
    border:none;
    background:#004a99;
    color:#fff;
    font-size:18px;
}

.result-count{
    margin-top:20px;
    color:#666;
}

.search-item{
    padding:20px 0;
    border-bottom:1px solid #eee;
}

.search-item:last-child{
    border-bottom:none;
}

.search-item h4{
    color:#004a99;
    font-size: 15px;
    font-weight:500;
    margin-bottom:10px;
}

.search-item a{
    text-decoration:none;
}

.search-item p{
    color:#555;
    margin:0;
}

</style>

@endpush
