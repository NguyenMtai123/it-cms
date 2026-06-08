@extends('theme::layouts.master')

@section('title', $page->name)

@section('content')

<div class="card">
    <div class="card-body">

        <h1>{{ $page->name }}</h1>

        @if($page->image)
            <img src="{{ asset($page->image) }}" class="img-fluid mb-3">
        @endif

        <p>{{ $page->description }}</p>

        <div>
            {!! $page->content !!}
        </div>

    </div>
</div>

@endsection
