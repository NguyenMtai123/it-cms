@extends('base::layouts.master')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="row mb-3">
        <div class="col-sm-6">
            <h3 class="m-0">Role Management</h3>
        </div>

        <div class="col-sm-6 text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createRoleModal">
                <i class="fas fa-plus"></i> Create Role
            </button>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="card card-outline card-primary">
        <div class="card-body">

            <form method="GET" class="row">
                <div class="col-md-4">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Search name or slug..."
                           value="{{ request('keyword') }}">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary btn-block">
                        Search
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- TABLE -->
    <div class="card">
        <div class="card-body table-responsive p-0">

            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Permissions</th>
                    <th width="160">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td><b>{{ $role->name }}</b></td>
                        <td><code>{{ $role->slug }}</code></td>
                        <td>
                            <span class="badge badge-info">
                                {{ count($role->permissions ?? []) }}
                            </span>
                        </td>

                        <td>
                            <!-- EDIT -->
                            <a href="{{ route('roles.edit', $role->id) }}"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- DELETE -->
                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteRole{{ $role->id }}">
                                            Delete
                                        </button>
                        </td>
                        <div class="modal fade" id="deleteRole{{ $role->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Role</h5>
                                            </div>

                                            <div class="modal-body">
                                                Are you sure delete <b>{{ $role->name }}</b>?
                                            </div>

                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger">Yes Delete</button>
                                                </form>

                                                <button class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

        <div class="card-footer clearfix">
            {{ $roles->links() }}
        </div>

    </div>

</div>

<!-- CREATE MODAL -->
@include('acl::roles.partials.create-modal')

@endsection
