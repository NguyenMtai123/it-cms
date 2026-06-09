@extends('base::layouts.master')

@section('title', 'Events')

@section('content')

<section class="content">
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="row mb-3">
        <div class="col-sm-6">
            <h3 class="mb-0">Events</h3>
            <small class="text-muted">Quản lý sự kiện hệ thống</small>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('events.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create Event
            </a>
        </div>
    </div>

    {{-- STATS --}}
    <div class="row mb-3">

        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $events->total() ?? $events->count() }}</h3>
                    <p>Total Events</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $events->where('status', 1)->count() }}</h3>
                    <p>Published</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $events->where('status', 0)->count() }}</h3>
                    <p>Draft</p>
                </div>
                <div class="icon">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- CARD TABLE --}}
    <div class="card card-outline card-primary">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3 class="card-title">Event List</h3>

            <div class="card-tools">
                <input type="text"
                       class="form-control form-control-sm"
                       placeholder="Search events...">
            </div>

        </div>

        <div class="card-body p-0">

            <table class="table table-hover table-striped mb-0">

                <thead class="thead-dark">
                    <tr>
                        <th width="60">ID</th>
                        <th>Title</th>
                        <th width="180">Start Date</th>
                        <th width="120">Status</th>
                        <th width="140" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($events as $event)

                    <tr>

                        <td>
                            <span class="badge badge-light">
                                #{{ $event->id }}
                            </span>
                        </td>

                        <td>
                            <strong>{{ $event->title }}</strong>
                        </td>

                        <td>
                            <i class="far fa-calendar-alt text-primary"></i>
                            {{ $event->start_date }}
                        </td>

                        <td>
                            @if($event->status)
                                <span class="badge badge-success">
                                    Published
                                </span>
                            @else
                                <span class="badge badge-secondary">
                                    Draft
                                </span>
                            @endif
                        </td>

                        <td class="text-center">

                            <div class="btn-group">

                                <a href="{{ route('events.edit', $event->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('events.destroy', $event->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this event?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center py-5">

                            <i class="fas fa-calendar-times fa-3x text-muted"></i>

                            <p class="mt-2 mb-3">No events found</p>

                            <a href="{{ route('events.create') }}"
                               class="btn btn-primary">
                                Create First Event
                            </a>

                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">
            {{ $events->links() }}
        </div>

    </div>

</div>
</section>

@endsection
