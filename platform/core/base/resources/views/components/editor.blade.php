@props([
    'name',
    'value' => '',
])

<textarea
    id="{{ $name }}"
    name="{{ $name }}"
>
{{ $value }}
</textarea>
<style>
.ck-editor__editable {
    min-height: 200px;
}
</style>

@once
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
@endonce
@include('base::components.editor-media')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const element = document.getElementById('{{ $name }}');

    if (!element) {
        return;
    }

    ClassicEditor
    .create(element, {
        extraPlugins: [
            MediaPickerPlugin
        ]
    })
    .then(editor => {

        window.ckeditorInstances =
            window.ckeditorInstances || {};

        window.ckeditorInstances['{{ $name }}'] =
            editor;

    })
    .catch(console.error);

});
</script>
