<script type="text/javascript">
    $(function () {
        $('input[name="title"]').keyup(function(){
            $('input[name="slug"]').val(slugify($(this).val()));
        });

        function slugify(text) // https://gist.github.com/mathewbyrne/1280286
        {
            return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')           // Replace spaces with -
                    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                    .replace(/^-+/, '')             // Trim - from start of text
                    .replace(/-+$/, '');            // Trim - from end of text
        }
    });
</script>