<script>

class MediaPickerAdapter {

    constructor(loader) {
        this.loader = loader;
    }

    upload() {

        return new Promise((resolve, reject) => {

            window.mediaEditorCallback = function(media) {

                resolve({
                    default: media.url
                });

            };

            window.open(
                '/admin/media/picker',
                'mediaPicker',
                'width=1200,height=700'
            );

        });

    }

    abort() {}

}

function MediaPickerPlugin(editor) {

    editor.plugins.get('FileRepository').createUploadAdapter =
        loader => {
            return new MediaPickerAdapter(loader);
        };

}

</script>
