@props(['name', 'value' => null])

<div class="media-picker-wrapper">

    <input type="hidden" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}">

    <div class="border rounded d-flex align-items-center justify-content-center bg-light mb-2"
        id="{{ $name }}_preview_wrapper" style="height:220px;cursor:pointer;overflow:hidden"
        onclick="openMediaPicker('{{ $name }}')">

        @if ($value)
            <img id="{{ $name }}_preview" src="{{ asset('storage/' . $value) }}" class="img-fluid w-100 h-100"
                style="object-fit:cover">
        @else
            <div id="{{ $name }}_placeholder" class="text-center text-muted">

                <i class="fas fa-image fa-3x mb-2"></i>

                <div>Click để chọn tệp</div>

            </div>

            <img id="{{ $name }}_preview" style="display:none" class="img-fluid w-100 h-100">
        @endif

    </div>

    <div class="btn-group w-100">

        <button type="button" class="btn btn-primary" onclick="openMediaPicker('{{ $name }}')">

            <i class="fas fa-folder-open mr-1"></i>
            Chọn tệp

        </button>

        <button type="button" class="btn btn-danger" onclick="clearMedia('{{ $name }}')">

            <i class="fas fa-trash"></i>

        </button>

    </div>

</div>
<script>
    window.addEventListener('message', function(event) {

        const media = event.data.media_selected;

        if (!media || !mediaTargetInput) {
            return;
        }

        const input =
            document.getElementById(mediaTargetInput);

        input.value = media.url;

        const preview =
            document.getElementById(
                mediaTargetInput + '_preview'
            );

        if (preview) {
            preview.src = '/storage/' + media.url;
            preview.style.display = 'block';
        }

        const placeholder =
            document.getElementById(
                mediaTargetInput + '_placeholder'
            );

        if (placeholder) {
            placeholder.style.display = 'none';
        }
    });

    function clearMedia(inputId) {
        document.getElementById(inputId).value = '';

        const preview =
            document.getElementById(
                inputId + '_preview'
            );

        if (preview) {
            preview.src = '';
            preview.style.display = 'none';
        }

        const placeholder =
            document.getElementById(
                inputId + '_placeholder'
            );

        if (placeholder) {
            placeholder.style.display = 'block';
        }
    }
</script>
