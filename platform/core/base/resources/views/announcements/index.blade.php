@extends('base::layouts.master')

@section('title', 'Announcements')

@section('page-header')
    <div class="row">
        <div class="col-sm-6">
            <h1>Announcements</h1>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('announcements.create') }}" class="btn btn-primary">
                Create Announcement
            </a>
        </div>
    </div>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Published At</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($announcements as $item)
                        <tr>
                            <td>
    {{ ($announcements->currentPage() - 1) * $announcements->perPage() + $loop->iteration }}
</td>

                            <td>
                                <strong>{{ $item->title }}</strong>
                                @if ($item->description)
                                    <div class="text-muted small">
                                        {{ \Illuminate\Support\Str::limit($item->description, 60) }}</div>
                                @endif
                            </td>

                            <td>{{ $item->slug }}</td>

                            <td>
                                {{ $item->published_at ? $item->published_at->format('d/m/Y H:i') : '—' }}
                            </td>

                            <td>
                                @if ($item->status)
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('announcements.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('announcements.destroy', $item->id) }}"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this announcement?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No announcements found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $announcements->links() }}

        </div>
    </div>

@endsection
