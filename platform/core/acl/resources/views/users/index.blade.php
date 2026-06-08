@extends('base::layouts.master')

@section('title', 'Users')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">User Management</h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="70">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                            </td>

                            <td>
                                {{ $user->first_name }} {{ $user->last_name }}
                            </td>

                            <td>{{ $user->email }}</td>

                            <td>{{ $user->username }}</td>

                            <td>
                                {{ $user->roles->first()?->name ?? '—' }}
                            </td>

                            <td>
                                {{ $user->created_at?->format('d/m/Y') ?? '—' }}
                            </td>

                            <td>
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button type="button"
                                        class="btn btn-sm btn-danger"
                                        data-toggle="modal"
                                        data-target="#deleteModal{{ $user->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Confirm Delete</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        Are you sure you want to delete:
                                        <strong>{{ $user->email }}</strong>?
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Cancel
                                        </button>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing
                    <strong>{{ $users->firstItem() }}</strong>
                    -
                    <strong>{{ $users->lastItem() }}</strong>
                    of
                    <strong>{{ $users->total() }}</strong>
                    users
                </div>

                {{ $users->withQueryString()->links() }}
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Add User
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
