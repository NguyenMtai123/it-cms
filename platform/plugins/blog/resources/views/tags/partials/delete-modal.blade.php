<div class="modal fade" id="deleteTagModal{{ $tag->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form action="/admin/blog/tags/{{ $tag->id }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-trash"></i> Xác nhận xóa
                    </h5>

                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
                    </div>

                    <h5 class="mb-2">Bạn có chắc muốn xóa?</h5>

                    <div class="alert alert-light border mb-2">
                        <strong>{{ $tag->name }}</strong>
                    </div>

                    <small class="text-muted">
                        Hành động này không thể hoàn tác
                    </small>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Hủy
                    </button>

                    <button type="submit" class="btn btn-danger">
                        Xóa
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
