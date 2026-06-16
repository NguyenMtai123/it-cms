@extends('base::layouts.master')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Media Manager')

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/core/media/css/media.css') }}">
@endpush

@section('page-header')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="m-0">Media Manager</h1>

        <div class="d-flex gap-2 flex-wrap">
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('media.index') }}">
                <i class="fas fa-sync-alt mr-1"></i> Refresh
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('media.picker') }}" target="_blank">
                Open picker
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="media-header-bar">
        <div class="media-breadcrumbs">
            @foreach ($breadcrumbs as $breadcrumb)
                <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                @if (!$loop->last)
                    <span>/</span>
                @endif
            @endforeach
        </div>

        <div class="media-toolbar-actions">
            <a class="btnx primary" href="javascript:void(0)" data-toggle="modal" data-target="#newFolderModal">
                <i class="fas fa-folder-plus"></i>
                New folder
            </a>

            @if ($currentFolder)
                <button type="button" class="btnx"
                    onclick="openRenameFolderModal(
                        {{ $currentFolder->id }},
                        @js($currentFolder->name),
                        @js(route('media.folders.rename', $currentFolder->id))
                    )">
                    <i class="fas fa-pen"></i>
                    Rename folder
                </button>

                <form method="POST" action="{{ route('media.folders.destroy', $currentFolder->id) }}"
                    onsubmit="return confirm('Delete this folder and all children?')" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnx danger">
                        <i class="fas fa-trash"></i>
                        Delete folder
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="media-shell">
        <aside class="media-card media-sidebar">
            <div class="media-sidebar-head">
                <div>
                    <div class="media-section-title">Tree</div>
                    <div class="media-section-subtitle">Browse all folders</div>
                </div>

                <a href="{{ route('media.index') }}" class="media-icon-btn" title="All media">
                    <i class="fas fa-layer-group"></i>
                </a>
            </div>

            <div class="media-tree-wrap">
                <a class="media-tree-root {{ (int) $currentFolderId === 0 ? 'active' : '' }}"
                    href="{{ route('media.index') }}">
                    <i class="fas fa-folder-open text-warning mr-2"></i>
                    All media
                </a>

                @if ($rootFolders->count())
                    @include('media::partials.folder-tree', [
                        'folders' => $rootFolders,
                        'currentFolderId' => $currentFolderId,
                        'routeName' => 'media.index',
                        'level' => 0,
                    ])
                @else
                    <div class="empty-state small mt-3">No folders yet.</div>
                @endif
            </div>
        </aside>

        <main class="media-card media-main">
            <div class="upload-box">
                <form id="uploadForm" method="POST" action="{{ route('media.upload') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="folder_id" value="{{ $currentFolderId }}">

                    <div class="upload-toolbar">
                        <div class="upload-title">
                            <h5 class="m-0">Upload files</h5>
                            <span class="text-muted small">Kéo thả hoặc chọn file</span>
                        </div>

                        <div class="upload-actions">
                            <label for="fileInput" class="btn-file">
                                <i class="fas fa-paperclip"></i>
                                Chọn file
                            </label>

                            <span id="selectedFiles" class="selected-files">
                                Chưa chọn file
                            </span>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-upload mr-1"></i>
                                Upload
                            </button>
                        </div>
                    </div>

                    <input type="file" name="file[]" multiple id="fileInput" hidden>

                    <div id="dropZone" class="drop-zone compact">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Kéo file vào đây để upload</span>
                    </div>

                    <div id="uploadError" class="text-danger mt-2" style="display:none;">
                        Please select at least one file
                    </div>
                </form>
            </div>

            <div class="media-section-title mt-4">Current folder items</div>
            <div class="media-section-subtitle mb-3">
                Click folder to enter, click file to open
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
                <div class="media-grid">
                    @foreach ($items as $item)
                        @if ($item->type === 'folder')
                            <div class="media-item folder">
                                <a href="{{ route('media.index', ['folder_id' => $item->id]) }}" class="media-item-link">
                                    <div class="media-thumb folder-thumb">
                                        <i class="fas fa-folder fa-2x text-warning"></i>
                                    </div>

                                    <div class="media-item-body">
                                        <div class="media-item-name">{{ $item->name }}</div>
                                        <div class="media-item-meta">Folder</div>
                                    </div>
                                </a>

                                <div class="media-mini-menu media-mini-menu-card">
                                    <button type="button" class="media-mini-menu-toggle" aria-label="Actions">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                    <div class="media-mini-menu-panel">
                                        <button type="button" class="media-mini-menu-item"
                                            onclick="window.location='{{ route('media.index', ['folder_id' => $item->id]) }}'">
                                            <i class="fas fa-folder-open mr-2"></i> Open
                                        </button>

                                        <button type="button" class="media-mini-menu-item"
                                            onclick="openRenameFolderModal(
                                                {{ $item->id }},
                                                @js($item->name),
                                                @js(route('media.folders.rename', $item->id))
                                            )">
                                            <i class="fas fa-pen mr-2"></i> Rename
                                        </button>

                                        <form method="POST" action="{{ route('media.folders.destroy', $item->id) }}"
                                            onsubmit="return confirm('Delete this folder and all children?')"
                                            class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="media-mini-menu-item danger">
                                                <i class="fas fa-trash mr-2"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            @php
                                $fileUrl = asset('storage/' . $item->url);
                                $isImage = Str::startsWith($item->mime_type, 'image/');
                            @endphp

                            <div class="media-item file">
                                <a href="{{ $fileUrl }}" target="_blank" class="media-item-link">
                                    <div class="media-thumb file-thumb">
                                        @if ($isImage)
                                            <img src="{{ $fileUrl }}" alt="{{ $item->alt ?? $item->name }}">
                                        @else
                                            <i class="fas fa-file fa-2x text-secondary"></i>
                                        @endif
                                    </div>

                                    <div class="media-item-body">
                                        <div class="media-item-name">{{ $item->name }}</div>
                                        <div class="media-item-meta">
                                            {{ $item->size ? number_format($item->size / 1024, 2) . ' KB' : 'File' }}
                                        </div>
                                    </div>
                                </a>

                                <div class="media-mini-menu media-mini-menu-card">
                                    <button type="button" class="media-mini-menu-toggle" aria-label="Actions">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                    <div class="media-mini-menu-panel">
                                        <a href="{{ $fileUrl }}" target="_blank" class="media-mini-menu-item">
                                            <i class="fas fa-external-link-alt mr-2"></i> Open
                                        </a>

                                        <a href="{{ $fileUrl }}" download class="media-mini-menu-item">
                                            <i class="fas fa-download mr-2"></i> Download
                                        </a>

                                        <button type="button" class="media-mini-menu-item"
                                            onclick="openRenameFileModal(
                                                {{ $item->id }},
                                                @js($item->name),
                                                @js(route('media.files.rename', $item->id))
                                            )">
                                            <i class="fas fa-pen mr-2"></i> Rename
                                        </button>

                                        {{-- <button
                                            type="button"
                                            class="media-mini-menu-item"
                                            onclick="openAltModal(
                                                {{ $item->id }},
                                                @js($item->alt),
                                                @js(route('media.files.alt', $item->id))
                                            )"
                                        >
                                            <i class="fas fa-image mr-2"></i> Alt text
                                        </button> --}}

                                        <form method="POST" action="{{ route('media.files.destroy', $item->id) }}"
                                            onsubmit="return confirm('Delete this file?')" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="media-mini-menu-item danger">
                                                <i class="fas fa-trash mr-2"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    No folders or files in this location.
                </div>
            @endif

            <div class="mt-3">
                {{ $files->links() }}
            </div>
        </main>
    </div>

    {{-- MODALS --}}
    @include('media::modals.new-folder')
    @include('media::modals.rename-folder')
    @include('media::modals.rename-file')
    @include('media::modals.alt')
@endsection

@push('scripts')
    <script src="{{ asset('vendor/core/media/js/media.js') }}"></script>
@endpush
