@extends('theme::layouts.master')

@section('title', $event->title)

@section('content')

<div class="card shadow-sm">
    @if($event->image)
        <img
            src="{{ asset('storage/' . $event->image) }}"
            class="card-img-top"
            alt="{{ $event->title }}"
            style="max-height:420px;object-fit:cover;"
        >
    @endif

    <div class="card-body">
        <h1 class="mb-3">{{ $event->title }}</h1>

        @if($event->location)
            <p class="text-muted mb-2">
                <strong>Location:</strong> {{ $event->location }}
            </p>
        @endif

        @if($event->start_date || $event->end_date)
            <p class="text-muted mb-2">
                <strong>Time:</strong>
                @if($event->start_date)
                    {{ $event->start_date->format('d/m/Y H:i') }}
                @endif
                @if($event->end_date)
                    -
                    {{ $event->end_date->format('d/m/Y H:i') }}
                @endif
            </p>
        @endif

        @if($event->description)
            <div class="alert alert-light border">
                {{ $event->description }}
            </div>
        @endif

        <div class="mt-3">
            {!! nl2br(e($event->content)) !!}
        </div>
    </div>
</div>

@endsection
