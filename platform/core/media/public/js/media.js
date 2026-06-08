function openRenameFolderModal(folderId, folderName, actionUrl) {
    document.getElementById('renameFolderName').value = folderName || '';
    document.getElementById('renameFolderForm').action = actionUrl;
    $('#renameFolderModal').modal('show');
}

function openRenameFileModal(fileId, fileName, actionUrl) {
    document.getElementById('renameFileName').value = fileName || '';
    document.getElementById('renameFileForm').action = actionUrl;
    $('#renameFileModal').modal('show');
}

function openAltModal(fileId, altText, actionUrl) {
    document.getElementById('altTextInput').value = altText || '';
    document.getElementById('altForm').action = actionUrl;
    $('#altModal').modal('show');
}

document.addEventListener('DOMContentLoaded', function () {
    const uploadForm = document.getElementById('uploadForm');
    const fileInput = document.getElementById('fileInput');
    const uploadError = document.getElementById('uploadError');
    const dropZone = document.getElementById('dropZone');

    if (uploadForm && fileInput && uploadError) {
        uploadForm.addEventListener('submit', function (e) {
            if (!fileInput.files || fileInput.files.length === 0) {
                e.preventDefault();
                uploadError.style.display = 'block';
            } else {
                uploadError.style.display = 'none';
            }
        });
    }

    if (dropZone && fileInput) {
        dropZone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropZone.classList.add('bg-white');
        });

        dropZone.addEventListener('dragleave', function () {
            dropZone.classList.remove('bg-white');
        });

        dropZone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropZone.classList.remove('bg-white');
            fileInput.files = e.dataTransfer.files;
        });
    }

    document.querySelectorAll('.file-item').forEach(function (el) {
        el.draggable = true;
        el.addEventListener('dragstart', function (e) {
            e.dataTransfer.setData('file_id', el.dataset.id);
        });
    });

    document.querySelectorAll('.folder-item').forEach(function (el) {
        el.addEventListener('dragover', function (e) {
            e.preventDefault();
        });

        el.addEventListener('drop', async function (e) {
            e.preventDefault();

            const fileId = e.dataTransfer.getData('file_id');
            if (!fileId) return;

            try {
                const res = await fetch("/admin/media/move-file", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        file_id: fileId,
                        folder_id: el.dataset.id
                    })
                });

                if (!res.ok) {
                    alert('Move failed');
                    return;
                }

                location.reload();
            } catch (error) {
                console.error(error);
                alert('Move failed');
            }
        });
    });
});
