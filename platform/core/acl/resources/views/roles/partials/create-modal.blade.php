<div class="modal fade" id="createRoleModal">
    <div class="modal-dialog modal-lg">

        <form method="POST" action="{{ route('roles.store') }}" class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Create Role</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <hr>

                <h5>Permissions</h5>

                @foreach(config('acl.permissions') as $group)
                    <div class="mb-2">
                        <b>{{ $group['name'] }}</b>

                        <div class="row">
                            @foreach($group['flags'] as $flag)
                                <div class="col-md-4">
                                    <label>
                                        <input type="checkbox"
                                               name="permissions[]"
                                               value="{{ $flag }}">
                                        {{ $flag }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Create</button>
            </div>

        </form>

    </div>
</div>
