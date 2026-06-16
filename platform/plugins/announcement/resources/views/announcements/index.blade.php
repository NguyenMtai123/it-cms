@extends('base::layouts.master')

@section('title', 'Announcements')

@section('page-header')
    <div class="d-flex justify-content-between">
        <h1>Announcements</h1>

        <a href="{{ route('announcements.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Create Announcement
        </a>
    </div>
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                Announcement Management
            </h3>
        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">

                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Title</th>
                        <th width="180">Publish At</th>
                        <th width="180">Expired At</th>
                        <th width="120">Status</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($announcements as $item)
                        <tr>

                            <td>
                                {{ ($announcements->currentPage() - 1) * $announcements->perPage() + $loop->iteration }}
                            </td>

                            <td>
                                <strong>{{ $item->title }}</strong>

                                <br>

                                <small class="text-muted">
                                    {{ $item->slug }}
                                </small>
                            </td>

                            <td>
                                {{ optional($item->publish_at)->format('d/m/Y H:i') }}
                            </td>

                            <td>
                                {{ optional($item->expired_at)->format('d/m/Y H:i') }}
                            </td>

                            <td>

                                @if ($item->is_active)
                                    <span class="badge badge-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge badge-secondary">
                                        Disabled
                                    </span>
                                @endif

                            </td>

                            <td>

                                <a href="{{ route('announcements.edit', $item->id) }}" class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('announcements.destroy', $item->id) }}" method="POST"
                                    style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete announcement?')" class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No announcements found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            {{ $announcements->links('pagination::bootstrap-4') }}

        </div>

    </div>

@endsection
