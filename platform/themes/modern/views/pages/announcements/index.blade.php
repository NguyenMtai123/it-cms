@extends('theme::layouts.master')

@section('title', 'Thông báo')

@section('content')
    <div class="card content-card mb-4">
        <div class="card-body p-4">
            <h1 class="section-title mb-2">Thông báo</h1>
            <p class="text-soft mb-0">Cập nhật các thông báo, lịch làm việc và tin tức quan trọng.</p>
        </div>
    </div>

    <div class="vstack gap-4">
        @forelse($announcements as $item)
            <div class="card post-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <h4 class="fw-bold mb-2">
                                <a href="/announcements/{{ $item->slug }}" class="text-dark">
                                    {{ $item->title }}
                                </a>
                            </h4>

                            <p class="text-soft mb-2">{{ $item->description }}</p>

                            @if($item->published_at)
                                <small class="text-soft">
                                    <i class="bi bi-calendar3 me-1"></i> {{ $item->published_at->format('d/m/Y') }}
                                </small>
                            @endif
                        </div>

                        <a href="/announcements/{{ $item->slug }}" class="btn btn-outline-primary btn-sm flex-shrink-0">
                            Xem
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-light border">Chưa có thông báo nào.</div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $announcements->links() }}
    </div>
@endsection
