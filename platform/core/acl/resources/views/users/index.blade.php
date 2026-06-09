@extends('base::layouts.master')

@section('title', 'Users')

@section('content')

<section class="content">
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="row mb-3">
        <div class="col-sm-6">
            <h3 class="mb-0">User Management</h3>
            <small class="text-muted">Quản lý tài khoản hệ thống</small>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add User
            </a>
        </div>
    </div>

    {{-- STATS --}}
    <div class="row mb-3">

        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $users->total() ?? $users->count() }}</h3>
                    <p>Total Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $users->whereNotNull('email_verified_at')->count() }}</h3>
                    <p>Verified</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $users->whereNull('email_verified_at')->count() }}</h3>
                    <p>Unverified</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-clock"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- CARD TABLE --}}
    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3 class="card-title">Users List</h3>

            <div class="card-tools">
                <input type="text"
                       class="form-control form-control-sm"
                       placeholder="Search users...">
            </div>

        </div>

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="thead-dark">
                    <tr>
                        <th width="70">#</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th width="120" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>
                            <span class="badge badge-light">
                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                            </span>
                        </td>

                        {{-- USER --}}
                        <td>
                            <div class="d-flex align-items-center">

                                <div class="mr-2">
                                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                         style="width:35px;height:35px;font-size:14px;">
                                        {{ strtoupper(substr($user->first_name ?? 'U', 0, 1)) }}
                                    </div>
                                </div>

                                <div>
                                    <strong>
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </strong>
                                </div>

                            </div>
                        </td>

                        {{-- EMAIL --}}
                        <td>{{ $user->email }}</td>

                        {{-- USERNAME --}}
                        <td>
                            <span class="text-muted">
                                {{ $user->username }}
                            </span>
                        </td>

                        {{-- ROLE --}}
                        <td>
                            @php
                                $role = $user->roles->first();
                            @endphp

                            @if($role)
                                <span class="badge badge-info">
                                    {{ $role->name }}
                                </span>
                            @else
                                <span class="badge badge-secondary">No Role</span>
                            @endif
                        </td>

                        {{-- CREATED --}}
                        <td>
                            <i class="far fa-calendar-alt text-primary"></i>
                            {{ $user->created_at?->format('d/m/Y') ?? '—' }}
                        </td>

                        {{-- ACTION --}}
                        <td class="text-center">

                            <div class="btn-group">

                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button type="button"
                                        class="btn btn-danger btn-sm"
                                        data-toggle="modal"
                                        data-target="#deleteModal{{ $user->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </div>

                        </td>

                    </tr>

                    {{-- DELETE MODAL --}}
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

                                    <form action="{{ route('users.destroy', $user->id) }}"
                                          method="POST"
                                          class="m-0">

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
                        <td colspan="7" class="text-center py-5">

                            <i class="fas fa-users fa-3x text-muted"></i>

                            <p class="mt-2">No users found</p>

                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                Create First User
                            </a>

                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="card-footer d-flex justify-content-between align-items-center">

            <div class="text-muted">
                Showing
                <strong>{{ $users->firstItem() }}</strong>
                -
                <strong>{{ $users->lastItem() }}</strong>
                of
                <strong>{{ $users->total() }}</strong>
            </div>

            {{ $users->withQueryString()->links() }}

        </div>

    </div>

</div>
</section>

@endsection
