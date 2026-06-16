function closeAllMediaMenus(except = null) {
    document.querySelectorAll('.media-mini-menu.open').forEach(function (menu) {
        if (except && menu === except) return;
        menu.classList.remove('open');
    });
}

document.addEventListener('click', function (e) {
    const toggler = e.target.closest('.media-mini-menu-toggle');
    const insideMenu = e.target.closest('.media-mini-menu');

    if (toggler) {
        const menu = toggler.closest('.media-mini-menu');
        const isOpen = menu.classList.contains('open');

        closeAllMediaMenus(menu);
        if (!isOpen) menu.classList.add('open');
        return;
    }

    if (!insideMenu) {
        closeAllMediaMenus();
    }
});

function openRenameFolderModal(folderId, folderName, actionUrl) {
    const form = document.getElementById('renameFolderForm');
    const input = document.getElementById('renameFolderName');

    if (form) form.action = actionUrl;
    if (input) input.value = folderName || '';

    if (window.$ && $('#renameFolderModal').modal) {
        $('#renameFolderModal').modal('show');
    }
}

function openRenameFileModal(fileId, fileName, actionUrl) {
    const form = document.getElementById('renameFileForm');
    const input = document.getElementById('renameFileName');

    if (form) form.action = actionUrl;
    if (input) input.value = fileName || '';

    if (window.$ && $('#renameFileModal').modal) {
        $('#renameFileModal').modal('show');
    }
}

function openAltModal(fileId, altText, actionUrl) {
    const form = document.getElementById('altForm');
    const input = document.getElementById('altTextInput');

    if (form) form.action = actionUrl;
    if (input) input.value = altText || '';

    if (window.$ && $('#altModal').modal) {
        $('#altModal').modal('show');
    }
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
            dropZone.classList.add('drag-over');
        });

        dropZone.addEventListener('dragleave', function () {
            dropZone.classList.remove('drag-over');
        });

        dropZone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropZone.classList.remove('drag-over');

            if (e.dataTransfer && e.dataTransfer.files) {
                fileInput.files = e.dataTransfer.files;
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const uploadForm = document.getElementById('uploadForm');
    const fileInput = document.getElementById('fileInput');
    const uploadError = document.getElementById('uploadError');
    const dropZone = document.getElementById('dropZone');
    const selectedFiles = document.getElementById('selectedFiles');

    function renderSelectedFiles(files) {
        if (!selectedFiles) return;

        if (!files || files.length === 0) {
            selectedFiles.innerHTML = '';
            selectedFiles.classList.add('d-none');
            return;
        }

        const names = Array.from(files).map(file => {
            return `<span class="file-chip">${file.name}</span>`;
        }).join('');

        selectedFiles.innerHTML = names;
        selectedFiles.classList.remove('d-none');
    }

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

    if (fileInput) {
        fileInput.addEventListener('change', function () {
            if (uploadError) uploadError.style.display = 'none';
            renderSelectedFiles(fileInput.files);
        });
    }

    if (dropZone && fileInput) {
        dropZone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropZone.classList.add('drag-over');
        });

        dropZone.addEventListener('dragleave', function () {
            dropZone.classList.remove('drag-over');
        });

        dropZone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropZone.classList.remove('drag-over');

            if (e.dataTransfer && e.dataTransfer.files) {
                fileInput.files = e.dataTransfer.files;
                renderSelectedFiles(fileInput.files);
            }
        });
    }
});
document.querySelectorAll('.media-mini-menu-toggle').forEach(btn => {
    btn.addEventListener('click', function (e) {
        e.stopPropagation();

        const menu = this.closest('.media-mini-menu');
        const item = this.closest('.media-tree-item');

        document.querySelectorAll('.media-mini-menu.open').forEach(m => {
            if (m !== menu) m.classList.remove('open');
        });

        document.querySelectorAll('.media-tree-item.menu-open').forEach(i => {
            if (i !== item) i.classList.remove('menu-open');
        });

        menu.classList.toggle('open');
        item.classList.toggle('menu-open');
    });
});

document.addEventListener('click', function () {
    document.querySelectorAll('.media-mini-menu.open').forEach(m => m.classList.remove('open'));
    document.querySelectorAll('.media-tree-item.menu-open').forEach(i => i.classList.remove('menu-open'));
});

fileInput.addEventListener('change', function () {

    const maxSize = 8 * 1024 * 1024;

    for (const file of fileInput.files) {

        if (file.size > maxSize) {

            alert(
                `File "${file.name}" vượt quá giới hạn 8MB`
            );

            fileInput.value = '';
            return;
        }
    }

    renderSelectedFiles(fileInput.files);
});
