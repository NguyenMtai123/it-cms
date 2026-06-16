<div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

        <div class="modal-content">

            <form action="{{ url('/admin/blog/categories/' . $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- HEADER --}}
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">
                        <i class="fas fa-edit"></i> Edit Category
                    </h5>

                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                {{-- BODY --}}
                <div class="modal-body">

                    <div class="form-group">
                        <label>Name</label>

                        <input type="text" name="name" value="{{ old('name', $category->name) }}"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description</label>

                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>

                        @error('description')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent Category</label>

                                <select name="parent_id" class="form-control">
                                    <option value="">— None —</option>

                                    @foreach ($categories as $parent)
                                        <option value="{{ $parent->id }}"
                                            {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">
                                    Thứ tự hiển thị
                                </label>

                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', $category->sort_order) }}">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Status</label>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="status_edit_{{ $category->id }}"
                                name="status" value="1" {{ old('status', $category->status) ? 'checked' : '' }}>

                            <label class="custom-control-label" for="status_edit_{{ $category->id }}">
                                Active
                            </label>
                        </div>
                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
