@extends('base::layouts.master')

@section('title', 'Customer Management')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">

        {{-- HEADER --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">Management</h4>
                <small class="text-muted">Manage system member</small>
            </div>
        </div>

        <div class="card-body">

            {{-- SEARCH --}}
            <form method="GET" class="row mb-3">
                <div class="col-md-4">
                    <input type="text"
                           name="keyword"
                           value="{{ request('keyword') }}"
                           class="form-control"
                           placeholder="Search by name, email...">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-secondary">
                        Search
                    </button>
                </div>
            </form>

            {{-- TABLE --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="thead-light">
                        <tr>
                            <th width="60">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="140">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($members as $member)
                            <tr>

                                <td>
                                    {{ ($members->currentPage() - 1) * $members->perPage() + $loop->iteration }}
                                </td>

                                <td>
                                    <div class="font-weight-bold">
                                        {{ $member->first_name }} {{ $member->last_name }}
                                    </div>
                                </td>

                                <td>{{ $member->email }}</td>

                                <td>
                                    <span class="badge badge-info">
                                        {{ $member->username }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge badge-success">
                                        Customer
                                    </span>
                                </td>

                                <td>
                                    <small class="text-muted">
                                        {{ $member->created_at->format('d/m/Y') }}
                                    </small>
                                </td>

                                <td class="text-right">

                                    <a href="{{ route('members.edit', $member->id) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button class="btn btn-sm btn-danger"
                                            data-toggle="modal"
                                            data-target="#delete{{ $member->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>

                            </tr>

                            {{-- DELETE MODAL --}}
                            <div class="modal fade" id="delete{{ $member->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title">Delete Customer</h5>
                                        </div>

                                        <div class="modal-body">
                                            Delete <b>{{ $member->email }}</b> ?
                                        </div>

                                        <div class="modal-footer">

                                            <button class="btn btn-secondary" data-dismiss="modal">
                                                Cancel
                                            </button>

                                            <form method="POST"
                                                  action="{{ route('members.destroy', $member->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger">
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
                                    No customers found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{-- FOOTER PAGINATION + ADD BUTTON --}}
            <div class="d-flex justify-content-between align-items-center mt-4">

                <div class="text-muted">
                    Showing {{ $members->firstItem() }} -
                    {{ $members->lastItem() }} of
                    {{ $members->total() }}
                </div>

                <div>
                    {{ $members->withQueryString()->links() }}
                </div>

                {{-- 🔥 ADD BUTTON BÊN PHẢI CUỐI --}}
                <div>
                    <a href="{{ route('members.create') }}"
                       class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Add Customer
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
