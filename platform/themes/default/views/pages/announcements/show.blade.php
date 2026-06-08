@extends('theme::layouts.master')

@section('title', $announcement->title)

@section('content')
    <article class="card content-card">
        @if($announcement->image)
            <img src="{{ asset('storage/' . $announcement->image) }}" class="w-100" style="max-height: 420px; object-fit: cover;">
        @endif

        <div class="card-body p-4 p-lg-5">
            <div class="mb-3">
                <span class="badge text-bg-info">Thông báo</span>
            </div>

            <h1 class="fw-bold mb-3">{{ $announcement->title }}</h1>

            @if($announcement->published_at)
                <p class="text-soft mb-4">
                    <i class="bi bi-calendar3 me-1"></i> {{ $announcement->published_at->format('d/m/Y') }}
                </p>
            @endif

            <div class="fs-5 lh-lg">
                {!! $announcement->content !!}
            </div>
        </div>
    </article>
@endsection
