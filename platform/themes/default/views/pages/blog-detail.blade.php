@extends('theme::layouts.master')

@section('title', $post->title)

@section('content')

    <div class="card content-card mb-4">
        <div class="card-body p-4">

            <h1 class="section-title mb-2">
                {{ $post->title }}
            </h1>

            <p class="text-soft mb-0">
                {{ $post->description }}
            </p>

        </div>
    </div>

    <div class="card post-card mb-4">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="w-100" style="max-height:400px; object-fit:cover;">
        @endif

        <div class="card-body p-4">
            <div class="post-content">
                {!! $post->content !!}
            </div>
        </div>
    </div>

    {{-- TAGS --}}
    <div class="mb-4">
        @if ($post->tags && $post->tags->count())
            @foreach ($post->tags as $tag)
                <span class="badge text-bg-primary">
                    #{{ $tag->name }}
                </span>
            @endforeach
        @endif
    </div>

@endsection
