@extends('base::layouts.master')

@section('content')

<div class="container-fluid">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Role</h3>
        </div>

        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control"
                               name="name"
                               value="{{ $role->name }}"
                               placeholder="Role name">
                    </div>

                    <div class="col-md-6">
                        <input class="form-control"
                               name="slug"
                               value="{{ $role->slug }}"
                               placeholder="Slug">
                    </div>
                </div>

                <hr>

                <h5>Permissions</h5>

                <div class="row">
                    @foreach($permissions as $group)
                        <div class="col-md-6 mb-3">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    {{ $group['name'] }}
                                </div>

                                <div class="card-body">
                                    @foreach($group['flags'] as $flag)
                                        <label class="d-block">
                                            <input type="checkbox"
                                                   name="permissions[]"
                                                   value="{{ $flag }}"
                                                   @checked(isset($role->permissions[$flag]))>
                                            {{ $flag }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-primary">Save Changes</button>
            </div>

        </form>

    </div>

</div>

@endsection
