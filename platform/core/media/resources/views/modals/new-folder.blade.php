<div class="modal fade" id="newFolderModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form method="POST" action="{{ route('media.folders.store') }}">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $currentFolderId }}">

                <div class="modal-header">
                    <h5 class="modal-title">New folder</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Folder name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" name="color" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Create</button>
                </div>

            </form>

        </div>
    </div>
</div>
