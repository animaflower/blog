<style type="text/css">
    .editor-toolbar.fullscreen, .editor-preview-side, .CodeMirror-fullscreen {
        z-index: 12;
    }

    .editor-toolbar.fullscreen {
        top: 70px;
    }

    .editor-preview-side, .CodeMirror-fullscreen {
        top: 120px;
    }

    .CodeMirror {
        height: 500px;
    }
</style>

@include('backend.post.partials.modals.help')

<script type="text/javascript">
    var simplemde;

    $(document).ready(function () {
        var toggleGuide = function () {
            $('#guide').modal('show');
        }
        simplemde = new SimpleMDE({
            element: document.getElementById("editor"),
            toolbar: [
                "bold", "italic", "heading", "|",
                "quote", "unordered-list", "ordered-list", "|",
                "link", "image", "|",
                "preview", "side-by-side", "fullscreen", "|",
                {
                    name: "guide",
                    action: toggleGuide,
                    className: "fa fa-question-circle",
                    title: "Markdown Guide",
                }
            ]
        });
    });
</script>
