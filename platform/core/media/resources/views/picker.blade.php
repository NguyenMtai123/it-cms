<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Media Picker</title>
    <style>
        :root {
            --bg: #f8fafc;
            --card: #ffffff;
            --border: #e5e7eb;
            --text: #111827;
            --muted: #6b7280;
            --primary: #2563eb;
            --primary-weak: #dbeafe;
            --danger: #dc2626;
            --warning: #f59e0b;
            --shadow: 0 10px 30px rgba(15, 23, 42, .06);
            --radius: 16px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        a {
            color: inherit;
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 20;
            background: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 14px 18px;
            box-shadow: 0 1px 0 rgba(0, 0, 0, .02);
        }

        .header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .header-title {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .header-title strong {
            font-size: 18px;
        }

        .header-title span {
            font-size: 13px;
            color: var(--muted);
        }

        .header-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            appearance: none;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text);
            border-radius: 10px;
            padding: 9px 12px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn:hover {
            background: #f9fafb;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-danger {
            background: #fff;
            color: var(--danger);
            border-color: rgba(220, 38, 38, .25);
        }

        .btn-danger:hover {
            background: #fef2f2;
        }

        .crumbs {
            padding: 12px 18px 0;
            font-size: 14px;
            color: var(--muted);
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            align-items: center;
        }

        .crumbs a {
            color: var(--primary);
            text-decoration: none;
        }

        .wrapper {
            display: grid;
            grid-template-columns: 290px minmax(0, 1fr);
            gap: 16px;
            padding: 16px 18px 22px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .sidebar {
            padding: 14px;
            min-height: calc(100vh - 120px);
        }

        .main {
            padding: 14px;
            min-height: calc(100vh - 120px);
        }

        .section-head {
            margin-bottom: 12px;
        }

        .section-title {
            margin: 0;
            font-size: 16px;
        }

        .section-subtitle {
            margin-top: 4px;
            font-size: 13px;
            color: var(--muted);
        }

        .tree-root {
            display: block;
            padding: 9px 10px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--text);
            font-size: 14px;
            margin-bottom: 6px;
        }

        .tree-root:hover {
            background: #f3f4f6;
        }

        .tree-root.active {
            background: var(--primary-weak);
            color: var(--primary);
            font-weight: 600;
        }

        .picker-tree {
            list-style: none;
            margin: 0;
            padding-left: 18px;
        }

        .picker-tree li {
            margin: 4px 0;
        }

        .picker-folder {
            display: block;
            padding: 8px 10px;
            border-radius: 8px;
            color: var(--text);
            text-decoration: none;
            font-size: 14px;
        }

        .picker-folder:hover {
            background: #f3f4f6;
        }

        .picker-folder.active {
            background: var(--primary-weak);
            color: var(--primary);
            font-weight: 600;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 14px;
        }

        .toolbar-left {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .toolbar-title {
            font-size: 18px;
            font-weight: 700;
        }

        .toolbar-subtitle {
            color: var(--muted);
            font-size: 13px;
        }

        .upload-box {
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            background: #fafafa;
            padding: 14px;
            margin-bottom: 16px;
        }

        .upload-row {
            display: flex;
            gap: 12px;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .upload-left {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .upload-title {
            font-size: 15px;
            font-weight: 700;
        }

        .upload-note {
            font-size: 13px;
            color: var(--muted);
        }

        .upload-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .file-chip {
            display: inline-flex;
            align-items: center;
            max-width: 220px;
            padding: 6px 10px;
            background: #eef2ff;
            border: 1px solid #c7d2fe;
            border-radius: 999px;
            font-size: 12px;
            color: #3730a3;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .selected-files {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            max-width: 360px;
        }

        .drop-zone {
            margin-top: 12px;
            border-radius: 14px;
            border: 1px dashed #cbd5e1;
            background: #fff;
            min-height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 8px;
            color: var(--muted);
            transition: .15s ease;
            padding: 14px;
            text-align: center;
        }

        .drop-zone.drag-over {
            border-color: var(--primary);
            background: #eff6ff;
            color: var(--primary);
        }

        .alert {
            padding: 12px 14px;
            border-radius: 12px;
            margin-bottom: 14px;
            font-size: 14px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
            gap: 12px;
        }

        .item {
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(15, 23, 42, .03);
            position: relative;
        }

        .item-link {
            display: block;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        .thumb {
            height: 100px;
            background: #f8fafc;
            border-bottom: 1px solid #eef2f7;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-size: 38px;
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .item-body {
            padding: 10px 11px 12px;
        }

        .item-name {
            font-size: 14px;
            font-weight: 700;
            word-break: break-word;
            line-height: 1.35;
            margin-bottom: 6px;
        }

        .item-meta {
            font-size: 12px;
            color: var(--muted);
        }

        .menu {
            position: absolute;
            top: 8px;
            right: 8px;
            z-index: 3;
        }

        .menu-toggle {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            border: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .96);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .menu-panel {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            width: 190px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            z-index: 10;
        }

        .menu.open .menu-panel {
            display: block;
        }

        .menu-item {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 12px;
            font-size: 14px;
            text-decoration: none;
            color: var(--text);
            border: 0;
            background: transparent;
            cursor: pointer;
            text-align: left;
        }

        .menu-item:hover {
            background: #f8fafc;
        }

        .menu-item.danger {
            color: var(--danger);
        }

        .empty {
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            background: #fafafa;
            color: var(--muted);
            padding: 18px;
            text-align: center;
        }

        .pager {
            margin-top: 16px;
        }

        .folder-item .thumb {
            background: #fffaf0;
        }

        .folder-badge {
            color: #f59e0b;
            font-size: 34px;
        }

        .hidden {
            display: none !important;
        }

        @media (max-width: 980px) {
            .wrapper {
                grid-template-columns: 1fr;
            }

            .sidebar,
            .main {
                min-height: auto;
            }
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
            gap: 12px;

            max-height: 600px;
            overflow-y: auto;
            overflow-x: visible;
        }

        .item {
            position: relative;
            overflow: visible;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-row">
            <div class="header-title">
                <strong>Media Picker</strong>
                <span>Chọn file, đi vào thư mục, upload, đổi tên, xóa ngay trong picker</span>
            </div>

            <div class="header-actions">
                <a class="btn" href="{{ route('media.picker') }}">
                    Refresh
                </a>
                <button type="button" class="btn btn-primary" onclick="window.close()">
                    Close
                </button>
            </div>
        </div>
    </div>

    <div class="crumbs">
        @foreach ($breadcrumbs as $breadcrumb)
            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
            @if (!$loop->last)
                <span>/</span>
            @endif
        @endforeach
    </div>

    @if (session('success'))
        <div class="alert alert-success" style="margin: 14px 18px 0;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error" style="margin: 14px 18px 0;">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="wrapper">
        <aside class="card sidebar">
            <div class="section-head">
                <h3 class="section-title">Folders</h3>
                <div class="section-subtitle">Chọn thư mục để mở</div>
            </div>

            <a class="tree-root {{ (int) $currentFolderId === 0 ? 'active' : '' }}" href="{{ route('media.picker') }}">
                📁 All media
            </a>

            @if ($rootFolders->count())
                @include('media::partials.picker-folder-tree', [
                    'folders' => $rootFolders,
                    'currentFolderId' => $currentFolderId,
                    'level' => 0,
                ])
            @else
                <div class="empty" style="margin-top: 12px;">No folders yet.</div>
            @endif
        </aside>

        <main class="card main">
            <div class="toolbar">
                <div class="toolbar-left">
                    <div class="toolbar-title">
                        {{ $currentFolder ? $currentFolder->name : 'All media' }}
                    </div>
                    <div class="toolbar-subtitle">
                        Click folder to enter, click file to select.
                    </div>
                </div>

                <div class="header-actions">
                    <button type="button" class="btn" onclick="openNewFolderModal()">
                        New folder
                    </button>

                    @if ($currentFolder)
                        <button type="button" class="btn"
                            onclick="openRenameFolderModal(
                                {{ $currentFolder->id }},
                                @js($currentFolder->name),
                                @js(route('media.folders.rename', $currentFolder->id))
                            )">
                            Rename folder
                        </button>

                        <form method="POST" action="{{ route('media.folders.destroy', $currentFolder->id) }}"
                            onsubmit="return confirm('Delete this folder and all children?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete folder</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="upload-box">
                <form id="uploadForm" method="POST" action="{{ route('media.upload') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="folder_id" value="{{ $currentFolderId }}">

                    <div class="upload-row">
                        <div class="upload-left">
                            <div class="upload-title">Upload files</div>
                            <div class="upload-note">Kéo thả hoặc chọn nhiều file</div>
                        </div>

                        <div class="upload-actions">
                            <label for="fileInput" class="btn btn-primary" style="cursor:pointer;">
                                Chọn file
                            </label>

                            <span id="selectedFiles" class="selected-files hidden"></span>

                            <button type="submit" class="btn btn-primary">
                                Upload
                            </button>
                        </div>
                    </div>

                    <input type="file" name="file[]" multiple id="fileInput" hidden>

                    <div id="dropZone" class="drop-zone">
                        <div style="font-size: 28px;">☁️</div>
                        <div>Kéo file vào đây để upload</div>
                    </div>

                    <div id="uploadError" class="alert alert-error hidden" style="margin: 12px 0 0;">
                        Please select at least one file.
                    </div>
                </form>
            </div>

            <div class="section-head" style="margin-top: 10px;">
                <h3 class="section-title">Current folder items</h3>
                <div class="section-subtitle">Thư mục con và file trong thư mục hiện tại</div>
            </div>

            @php
                $items = collect();

                foreach ($folders as $folder) {
                    $items->push(
                        (object) [
                            'type' => 'folder',
                            'id' => $folder->id,
                            'name' => $folder->name,
                            'size' => null,
                            'mime_type' => null,
                            'url' => null,
                            'alt' => null,
                            'model' => $folder,
                        ],
                    );
                }

                foreach ($files as $file) {
                    $items->push(
                        (object) [
                            'type' => 'file',
                            'id' => $file->id,
                            'name' => $file->name,
                            'size' => $file->size,
                            'mime_type' => $file->mime_type,
                            'url' => $file->url,
                            'alt' => $file->alt,
                            'model' => $file,
                        ],
                    );
                }
            @endphp

            @if ($items->count())
                <div class="grid">
                    @foreach ($items as $item)
                        @if ($item->type === 'folder')
                            <div class="item folder-item">
                                <a href="{{ route('media.picker', ['folder_id' => $item->id]) }}" class="item-link">
                                    <div class="thumb">
                                        <span class="folder-badge">📁</span>
                                    </div>
                                    <div class="item-body">
                                        <div class="item-name">{{ $item->name }}</div>
                                        <div class="item-meta">Folder</div>
                                    </div>
                                </a>

                                <div class="menu">
                                    <button type="button" class="menu-toggle" aria-label="Actions">
                                        ⋮
                                    </button>

                                    <div class="menu-panel">
                                        <button type="button" class="menu-item"
                                            onclick="window.location='{{ route('media.picker', ['folder_id' => $item->id]) }}'">
                                            Open
                                        </button>

                                        <button type="button" class="menu-item"
                                            onclick="openRenameFolderModal(
                                                {{ $item->id }},
                                                @js($item->name),
                                                @js(route('media.folders.rename', $item->id))
                                            )">
                                            Rename
                                        </button>

                                        <form method="POST" action="{{ route('media.folders.destroy', $item->id) }}"
                                            onsubmit="return confirm('Delete this folder and all children?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="menu-item danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            @php
                                $fileUrl = asset('storage/' . $item->url);
                                $isImage = str_starts_with($item->mime_type, 'image/');
                            @endphp

                            <div class="item file-item" data-file-id="{{ $item->id }}">
                                <div class="menu">
                                    <button type="button" class="menu-toggle" aria-label="Actions">
                                        ⋮
                                    </button>

                                    <div class="menu-panel">
                                        <a href="{{ $fileUrl }}" target="_blank" class="menu-item">Open</a>

                                        <a href="{{ $fileUrl }}" download class="menu-item">Download</a>

                                        <button type="button" class="menu-item"
                                            onclick="openRenameFileModal(
                                                {{ $item->id }},
                                                @js($item->name),
                                                @js(route('media.files.rename', $item->id))
                                            )">
                                            Rename
                                        </button>

                                        <form method="POST" action="{{ route('media.files.destroy', $item->id) }}"
                                            onsubmit="return confirm('Delete this file?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="menu-item danger">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="item-link"
                                    onclick="selectMedia(
                                    {{ $item->id }},
                                    @js($fileUrl),
                                    @js($item->name),
                                    @js($item->alt)
                                )">
                                    <div class="thumb">
                                        @if ($isImage)
                                            <img src="{{ $fileUrl }}" alt="{{ $item->alt ?? $item->name }}">
                                        @else
                                            📄
                                        @endif
                                    </div>

                                    <div class="item-body">
                                        <div class="item-name">{{ $item->name }}</div>
                                        <div class="item-meta">
                                            {{ $item->size ? number_format($item->size / 1024, 2) . ' KB' : 'File' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="empty">No folders or files in this location.</div>
            @endif

            <div class="pager">
                {{ $files->links() }}
            </div>
        </main>
    </div>

    {{-- New folder modal --}}
    <div id="newFolderModal" class="hidden"
        style="position:fixed; inset:0; background:rgba(15,23,42,.5); z-index:50; align-items:center; justify-content:center; padding:18px;">
        <div
            style="width:min(520px, 100%); background:#fff; border-radius:16px; border:1px solid #e5e7eb; box-shadow:0 20px 50px rgba(0,0,0,.18);">
            <div
                style="padding:14px 16px; border-bottom:1px solid #e5e7eb; display:flex; justify-content:space-between; align-items:center;">
                <strong>New folder</strong>
                <button type="button" class="btn" onclick="closeModal('newFolderModal')">Close</button>
            </div>
            <form method="POST" action="{{ route('media.folders.store') }}" style="padding:16px;">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $currentFolderId }}">
                <div style="display:flex; flex-direction:column; gap:8px;">
                    <label>Name</label>
                    <input type="text" name="name" maxlength="120" required
                        style="padding:10px 12px; border:1px solid #d1d5db; border-radius:10px; width:100%;">
                </div>
                <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:16px;">
                    <button type="button" class="btn" onclick="closeModal('newFolderModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Rename folder modal --}}
    <div id="renameFolderModal" class="hidden"
        style="position:fixed; inset:0; background:rgba(15,23,42,.5); z-index:50; align-items:center; justify-content:center; padding:18px;">
        <div
            style="width:min(520px, 100%); background:#fff; border-radius:16px; border:1px solid #e5e7eb; box-shadow:0 20px 50px rgba(0,0,0,.18);">
            <div
                style="padding:14px 16px; border-bottom:1px solid #e5e7eb; display:flex; justify-content:space-between; align-items:center;">
                <strong>Rename folder</strong>
                <button type="button" class="btn" onclick="closeModal('renameFolderModal')">Close</button>
            </div>
            <form id="renameFolderForm" method="POST" style="padding:16px;">
                @csrf
                {{-- @method('PUT') --}}
                <div style="display:flex; flex-direction:column; gap:8px;">
                    <label>Name</label>
                    <input id="renameFolderName" type="text" name="name" maxlength="120" required
                        style="padding:10px 12px; border:1px solid #d1d5db; border-radius:10px; width:100%;">
                </div>
                <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:16px;">
                    <button type="button" class="btn" onclick="closeModal('renameFolderModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Rename file modal --}}
    <div id="renameFileModal" class="hidden"
        style="position:fixed; inset:0; background:rgba(15,23,42,.5); z-index:50; align-items:center; justify-content:center; padding:18px;">
        <div
            style="width:min(520px, 100%); background:#fff; border-radius:16px; border:1px solid #e5e7eb; box-shadow:0 20px 50px rgba(0,0,0,.18);">
            <div
                style="padding:14px 16px; border-bottom:1px solid #e5e7eb; display:flex; justify-content:space-between; align-items:center;">
                <strong>Rename file</strong>
                <button type="button" class="btn" onclick="closeModal('renameFileModal')">Close</button>
            </div>
            <form id="renameFileForm" method="POST" style="padding:16px;">
                @csrf
                @method('PUT')
                <div style="display:flex; flex-direction:column; gap:8px;">
                    <label>Name</label>
                    <input id="renameFileName" type="text" name="name" maxlength="120" required
                        style="padding:10px 12px; border:1px solid #d1d5db; border-radius:10px; width:100%;">
                </div>
                <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:16px;">
                    <button type="button" class="btn" onclick="closeModal('renameFileModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Alt modal --}}
    <div id="altModal" class="hidden"
        style="position:fixed; inset:0; background:rgba(15,23,42,.5); z-index:50; align-items:center; justify-content:center; padding:18px;">
        <div
            style="width:min(520px, 100%); background:#fff; border-radius:16px; border:1px solid #e5e7eb; box-shadow:0 20px 50px rgba(0,0,0,.18);">
            <div
                style="padding:14px 16px; border-bottom:1px solid #e5e7eb; display:flex; justify-content:space-between; align-items:center;">
                <strong>Alt text</strong>
                <button type="button" class="btn" onclick="closeModal('altModal')">Close</button>
            </div>
            <form id="altForm" method="POST" style="padding:16px;">
                @csrf
                @method('PUT')
                <div style="display:flex; flex-direction:column; gap:8px;">
                    <label>Alt text</label>
                    <textarea id="altTextInput" name="alt" rows="4"
                        style="padding:10px 12px; border:1px solid #d1d5db; border-radius:10px; width:100%; resize:vertical;"></textarea>
                </div>
                <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:16px;">
                    <button type="button" class="btn" onclick="closeModal('altModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.remove('hidden');
                el.style.display = 'flex';
            }
        }

        function closeModal(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.add('hidden');
                el.style.display = 'none';
            }
        }

        function openNewFolderModal() {
            openModal('newFolderModal');
        }

        function openRenameFolderModal(folderId, folderName, actionUrl) {
            const form = document.getElementById('renameFolderForm');
            const input = document.getElementById('renameFolderName');

            if (form) form.action = actionUrl;
            if (input) input.value = folderName || '';

            openModal('renameFolderModal');
        }

        function openRenameFileModal(fileId, fileName, actionUrl) {
            const form = document.getElementById('renameFileForm');
            const input = document.getElementById('renameFileName');

            if (form) form.action = actionUrl;
            if (input) input.value = fileName || '';

            openModal('renameFileModal');
        }

        function openAltModal(fileId, altText, actionUrl) {
            const form = document.getElementById('altForm');
            const input = document.getElementById('altTextInput');

            if (form) form.action = actionUrl;
            if (input) input.value = altText || '';

            openModal('altModal');
        }

        function selectMedia(id, url, name, alt) {

            const relativePath =
                url.replace(window.location.origin + '/storage/', '');

            if (window.opener && !window.opener.closed) {

                window.opener.postMessage({
                    media_selected: {
                        id,
                        url: relativePath,
                        name,
                        alt
                    }
                }, '*');
            }

            window.close();
        }

        function closeAllMenus(except = null) {
            document.querySelectorAll('.menu.open').forEach(function(menu) {
                if (except && menu === except) return;
                menu.classList.remove('open');
            });
        }

        document.addEventListener('click', function(e) {
            const toggler = e.target.closest('.menu-toggle');
            const insideMenu = e.target.closest('.menu');

            if (toggler) {
                const menu = toggler.closest('.menu');
                const isOpen = menu.classList.contains('open');

                closeAllMenus(menu);
                if (!isOpen) menu.classList.add('open');
                return;
            }

            if (!insideMenu) {
                closeAllMenus();
            }

            const modal = e.target.classList.contains('hidden') ? e.target : null;
            if (modal) {
                modal.classList.add('hidden');
                modal.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const uploadForm = document.getElementById('uploadForm');
            const fileInput = document.getElementById('fileInput');
            const uploadError = document.getElementById('uploadError');
            const dropZone = document.getElementById('dropZone');
            const selectedFiles = document.getElementById('selectedFiles');

            function renderSelectedFiles(files) {
                if (!selectedFiles) return;

                if (!files || files.length === 0) {
                    selectedFiles.innerHTML = '';
                    selectedFiles.classList.add('hidden');
                    return;
                }

                const names = Array.from(files).map(file => {
                    return `<span class="file-chip">${file.name}</span>`;
                }).join('');

                selectedFiles.innerHTML = names;
                selectedFiles.classList.remove('hidden');
            }

            if (uploadForm && fileInput && uploadError) {
                uploadForm.addEventListener('submit', function(e) {
                    if (!fileInput.files || fileInput.files.length === 0) {
                        e.preventDefault();
                        uploadError.classList.remove('hidden');
                    } else {
                        uploadError.classList.add('hidden');
                    }
                });
            }

            if (fileInput) {
                fileInput.addEventListener('change', function() {
                    if (uploadError) uploadError.classList.add('hidden');
                    renderSelectedFiles(fileInput.files);
                });
            }

            if (dropZone && fileInput) {
                dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    dropZone.classList.add('drag-over');
                });

                dropZone.addEventListener('dragleave', function() {
                    dropZone.classList.remove('drag-over');
                });

                dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    dropZone.classList.remove('drag-over');

                    if (e.dataTransfer && e.dataTransfer.files) {
                        fileInput.files = e.dataTransfer.files;
                        renderSelectedFiles(fileInput.files);
                    }
                });
            }
        });
        fileInput.addEventListener('change', function() {

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
    </script>
</body>

</html>
