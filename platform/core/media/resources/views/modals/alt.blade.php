<div class="modal fade" id="altModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form id="altForm" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Alt text</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="text"
                           id="altTextInput"
                           name="alt"
                           class="form-control">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>
