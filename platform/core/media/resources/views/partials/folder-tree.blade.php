@php
    $routeName = $routeName ?? 'media.index';
    $currentFolderId = (int) ($currentFolderId ?? 0);
    $level = (int) ($level ?? 0);
@endphp

<ul class="media-tree-list media-tree-level-{{ $level }}">
    @foreach($folders as $folder)
        @php
            $isActive = $currentFolderId === (int) $folder->id;
            $hasChildren = $folder->children && $folder->children->count() > 0;
        @endphp

        <li class="media-tree-item {{ $isActive ? 'active' : '' }}">
            <div class="media-tree-row">
                <a
                    href="{{ route($routeName, ['folder_id' => $folder->id]) }}"
                    class="media-tree-link {{ $isActive ? 'active' : '' }}"
                    title="{{ $folder->name }}"
                >
                    <i class="fas fa-folder mr-2 text-warning"></i>
                    <span class="media-tree-name">{{ $folder->name }}</span>
                </a>

                <div class="media-mini-menu">
                    <button type="button" class="media-mini-menu-toggle" aria-label="Actions">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>

                    <div class="media-mini-menu-panel">
                        <button
                            type="button"
                            class="media-mini-menu-item"
                            onclick="window.location='{{ route($routeName, ['folder_id' => $folder->id]) }}'"
                        >
                            <i class="fas fa-folder-open mr-2"></i> Open
                        </button>

                        <button
                            type="button"
                            class="media-mini-menu-item"
                            onclick="openRenameFolderModal(
                                {{ $folder->id }},
                                @js($folder->name),
                                @js(route('media.folders.rename', $folder->id))
                            )"
                        >
                            <i class="fas fa-pen mr-2"></i> Rename
                        </button>

                        <form
                            method="POST"
                            action="{{ route('media.folders.destroy', $folder->id) }}"
                            onsubmit="return confirm('Delete this folder and all children?')"
                            class="m-0"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="media-mini-menu-item danger">
                                <i class="fas fa-trash mr-2"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @if($hasChildren)
                @include('media::partials.folder-tree', [
                    'folders' => $folder->children,
                    'currentFolderId' => $currentFolderId,
                    'routeName' => $routeName,
                    'level' => $level + 1,
                ])
            @endif
        </li>
    @endforeach
</ul>
