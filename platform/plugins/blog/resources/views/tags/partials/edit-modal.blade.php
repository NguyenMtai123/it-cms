<div class="modal fade" id="editTagModal{{ $tag->id }}" tabindex="-1" role="dialog">

    <div class="modal-dialog modal-md" role="document">

        <form action="/admin/blog/tags/{{ $tag->id }}" method="POST" class="modal-content shadow">

            @csrf
            @method('PUT')

            {{-- HEADER --}}
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-edit"></i> Edit Tag
                </h5>

                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            {{-- BODY --}}
            <div class="modal-body bg-light">

                <div class="form-group">
                    <label>Name</label>

                    <input type="text"
                           name="name"
                           value="{{ $tag->name }}"
                           class="form-control form-control-lg"
                           placeholder="Enter tag name"
                           required>
                </div>

                <div class="form-group">
                    <label>Slug</label>

                    <input type="text"
                           name="slug"
                           value="{{ $tag->slug }}"
                           class="form-control"
                           placeholder="auto or custom">
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="modal-footer bg-white">

                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                    Cancel
                </button>

                <button type="submit"
                        class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>

            </div>

        </form>

    </div>
</div>
