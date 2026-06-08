<div class="modal fade" id="editCategoryModal{{ $category->id }}">
    <div class="modal-dialog">

        <form action="/admin/blog/categories/{{ $category->id }}"
              method="POST"
              class="modal-content">

            @csrf
            @method('PUT')

            <div class="modal-header bg-warning">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           value="{{ $category->name }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ $category->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Parent</label>
                    <select name="parent_id" class="form-control">
                        <option value="">None</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                @selected($category->parent_id == $cat->id)>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox"
                               name="status"
                               value="1"
                               @checked($category->status)>
                        Active
                    </label>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-warning">Update</button>
            </div>

        </form>

    </div>
</div>
