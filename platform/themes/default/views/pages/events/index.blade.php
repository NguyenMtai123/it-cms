@extends('theme::layouts.master')

@section('title', 'Events')

@section('content')

<div class="row">
    <div class="col-md-12 mb-4">
        <h1>Events</h1>
        <p class="text-muted">Danh sách sự kiện của khoa / nhà trường</p>
    </div>
</div>

<div class="row">
    @forelse($events as $event)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($event->image)
                    <img
                        src="{{ asset('storage/' . $event->image) }}"
                        class="card-img-top"
                        alt="{{ $event->title }}"
                        style="height:220px;object-fit:cover;"
                    >
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>

                    @if($event->location)
                        <div class="text-muted small mb-2">
                            <i class="bi bi-geo-alt"></i> {{ $event->location }}
                        </div>
                    @endif

                    @if($event->description)
                        <p class="card-text">
                            {{ \Illuminate\Support\Str::limit($event->description, 120) }}
                        </p>
                    @endif

                    <div class="small text-muted mb-3">
                        @if($event->start_date)
                            <div>Start: {{ $event->start_date->format('d/m/Y H:i') }}</div>
                        @endif
                        @if($event->end_date)
                            <div>End: {{ $event->end_date->format('d/m/Y H:i') }}</div>
                        @endif
                    </div>

                    <a href="{{ route('public.events.show', $event->slug) }}" class="btn btn-primary btn-sm">
                        View detail
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-md-12">
            <div class="alert alert-info">
                No events found.
            </div>
        </div>
    @endforelse
</div>

{{ $events->links() }}

@endsection
