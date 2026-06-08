@foreach($folders as $folder)
    <option value="{{ $folder->id }}">
        {{ str_repeat('— ', $level ?? 0) }}{{ $folder->name }}
    </option>

    @if($folder->children->count())
        @include('media::partials.folder-options', [
            'folders' => $folder->children,
            'level' => ($level ?? 0) + 1,
        ])
    @endif
@endforeach
