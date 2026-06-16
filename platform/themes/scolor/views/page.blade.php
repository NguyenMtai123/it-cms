@extends('theme::layouts.master')

@section('title', $page->name)

@section('content')

    <div class="card mb-3">
        <div class="card-body">

            <h1>{{ $page->name }}</h1>

            @if ($page->image)
                <img src="{{ asset($page->image) }}" class="img-fluid mb-3">
            @endif

            <p>{{ $page->description }}</p>

            <div class="post-content">
                {!! $page->content !!}
            </div>

            @if ($page->file)

                @php
                    $extension = strtolower(pathinfo($page->file, PATHINFO_EXTENSION));
                @endphp

                @if ($extension === 'pdf')
                    <div class="mt-4">

                        <iframe src="{{ asset($page->file) }}" width="100%" height="1000" style="border:1px solid #ddd;">
                        </iframe>

                    </div>
                @else
                    <div class="mt-4">

                        <a href="{{ asset($page->file) }}" target="_blank" class="btn btn-primary">

                            Tải tài liệu

                        </a>

                    </div>
                @endif

            @endif

        </div>
    </div>

@endsection
<style>
    <style>
.post-content{
    font-size: 16px;
    line-height: 1.8;
    color: #333;
}

.post-content p{
    margin-bottom: 1rem;
}

.post-content h1{
    font-size: 2rem;
}

.post-content h2{
    font-size: 1.75rem;
}

.post-content h3{
    font-size: 1.5rem;
}

.post-content h4{
    font-size: 1.25rem;
}

.post-content img{
    max-width: 100%;
    height: auto;
}

.post-content table{
    width: 100%;
}
</style>
</style>
