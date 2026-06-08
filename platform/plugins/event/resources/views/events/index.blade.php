@extends('base::layouts.master')

@section('title', 'Events')

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('events.create') }}" class="btn btn-primary">
            Create Event
        </a>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Start</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->status ? 'Published' : 'Draft' }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event->id) }}">Edit</a>

                        <form method="POST" action="{{ route('events.destroy', $event->id) }}">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

        {{ $events->links() }}

    </div>

</div>

@endsection
