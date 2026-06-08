<script>

let mediaTargetInput = null;

function openMediaPicker(inputId)
{
    mediaTargetInput = inputId;

    window.open(
        '/admin/media/picker',
        'mediaPicker',
        'width=1200,height=700'
    );
}

window.addEventListener('message', function(event){

    const media = event.data.media_selected;

    if (!media || !mediaTargetInput) {
        return;
    }

    document.getElementById(mediaTargetInput).value = media.url;

});
</script>
