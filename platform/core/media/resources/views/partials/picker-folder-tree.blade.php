@php
    $currentFolderId = (int) ($currentFolderId ?? 0);
    $level = (int) ($level ?? 0);
@endphp

<ul class="picker-tree level-{{ $level }}">
    @foreach($folders as $folder)

        <li>

            <a
                href="{{ route('media.picker', ['folder_id' => $folder->id]) }}"
                class="picker-folder {{ $currentFolderId == $folder->id ? 'active' : '' }}"
            >
                📁 {{ $folder->name }}
            </a>

            @if($folder->children->count())
                @include('media::partials.picker-folder-tree', [
                    'folders' => $folder->children,
                    'currentFolderId' => $currentFolderId,
                    'level' => $level + 1,
                ])
            @endif

        </li>

    @endforeach
</ul>
