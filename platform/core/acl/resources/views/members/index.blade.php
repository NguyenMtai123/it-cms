@extends('base::layouts.master')

@section('title', 'Customer Management')

@section('content')

<section class="content">
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="row mb-3">
        <div class="col-sm-6">
            <h3 class="mb-0">Customer Management</h3>
            <small class="text-muted">Quản lý khách hàng hệ thống</small>
        </div>

        <div class="col-sm-6 text-right">
            <a href="{{ route('members.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Customer
            </a>
        </div>
    </div>

    {{-- STATS --}}
    <div class="row mb-3">

        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $members->total() ?? $members->count() }}</h3>
                    <p>Total Customers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $members->whereNotNull('email_verified_at')->count() }}</h3>
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
                    <h3>{{ $members->whereNull('email_verified_at')->count() }}</h3>
                    <p>Unverified</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-clock"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- CARD --}}
    <div class="card card-outline card-primary shadow-sm">

        {{-- HEADER + SEARCH --}}
        <div class="card-header d-flex justify-content-between align-items-center">

            <h3 class="card-title">
                <i class="fas fa-user-friends"></i> Customer List
            </h3>

            <form method="GET" class="d-flex">
                <input type="text"
                       name="keyword"
                       value="{{ request('keyword') }}"
                       class="form-control form-control-sm"
                       placeholder="Search name, email...">

                <button class="btn btn-sm btn-secondary ml-2">
                    <i class="fas fa-search"></i>
                </button>
            </form>

        </div>

        {{-- TABLE --}}
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="thead-dark">
                        <tr>
                            <th width="60">#</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="120" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($members as $member)

                        <tr>

                            <td>
                                <span class="badge badge-light">
                                    {{ ($members->currentPage() - 1) * $members->perPage() + $loop->iteration }}
                                </span>
                            </td>

                            {{-- CUSTOMER --}}
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center mr-2"
                                         style="width:35px;height:35px;font-size:14px;">
                                        {{ strtoupper(substr($member->first_name ?? 'C', 0, 1)) }}
                                    </div>

                                    <div class="font-weight-bold">
                                        {{ $member->first_name }} {{ $member->last_name }}
                                    </div>

                                </div>
                            </td>

                            {{-- EMAIL --}}
                            <td>{{ $member->email }}</td>

                            {{-- USERNAME --}}
                            <td>
                                <span class="badge badge-info">
                                    {{ $member->username }}
                                </span>
                            </td>

                            {{-- STATUS --}}
                            <td>
                                <span class="badge badge-success">
                                    Customer
                                </span>
                            </td>

                            {{-- CREATED --}}
                            <td>
                                <i class="far fa-calendar-alt text-primary"></i>
                                {{ $member->created_at->format('d/m/Y') }}
                            </td>

                            {{-- ACTION --}}
                            <td class="text-center">

                                <div class="btn-group">

                                    <a href="{{ route('members.edit', $member->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#delete{{ $member->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                        {{-- DELETE MODAL --}}
                        <div class="modal fade" id="delete{{ $member->id }}">

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Confirm Delete</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
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
                            <td colspan="7" class="text-center py-5">

                                <i class="fas fa-user-slash fa-3x text-muted"></i>

                                <p class="mt-2">No customers found</p>

                                <a href="{{ route('members.create') }}"
                                   class="btn btn-primary">
                                    Add First Customer
                                </a>

                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- FOOTER --}}
        <div class="card-footer d-flex justify-content-between align-items-center">

            <div class="text-muted">
                Showing {{ $members->firstItem() }} -
                {{ $members->lastItem() }} of
                {{ $members->total() }}
            </div>

            {{ $members->withQueryString()->links() }}

        </div>

    </div>

</div>
</section>

@endsection
