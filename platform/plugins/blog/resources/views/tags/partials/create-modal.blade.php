<div class="modal fade" id="createTagModal">
    <div class="modal-dialog">

        <form action="/admin/blog/tags" method="POST" class="modal-content">

            @csrf

            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Create Tag</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label>Tag Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter tag name" required>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>

                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>

        </form>

    </div>
</div>
