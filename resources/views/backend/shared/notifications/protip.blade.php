<script type="text/javascript">
    $(document).ready(function () {
        $(window).load(function () {
            function notify(message, type){
                $.growl({
                    message: message
                },{
                    type: type,
                    allow_dismiss: false,
                    label: 'Cancel',
                    className: 'btn-xs btn-inverse',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    delay: 3200,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 20,
                        y: 85
                    }
                });
            }
            setTimeout(function () {
                var message1 = '<strong>ProTip!</strong> Use &#8984;+s or CTL+s as keyboard shortcuts to save a form.';
                var message2 = '<strong>ProTip!</strong> Use &#8984;+\' to toggle blockquotes in the markdown editor.';
                var message3 = '<strong>ProTip!</strong> Use &#8984;+b to toggle bold text in the markdown editor.';
                var message4 = '<strong>ProTip!</strong> Use &#8984;+h to toggle headings in the markdown editor.';
                var message5 = '<strong>ProTip!</strong> Use &#8984;+i to toggle italics text in the markdown editor.';
                var message6 = '<strong>ProTip!</strong> Use &#8984;+k to draw a link in the markdown editor.';
                var message7 = '<strong>ProTip!</strong> Use &#8984;+l to draw an unordered list in the markdown editor.';
                var message8 = '<strong>ProTip!</strong> Use &#8984;+Alt+c to toggle a code block in the markdown editor.';
                var message9 = '<strong>ProTip!</strong> Use &#8984;+Alt+i to draw an image in the markdown editor.';
                var message10 = '<strong>ProTip!</strong> Use &#8984;+Alt-l to toggle an ordered list in the markdown editor.';
                var message11 = '<strong>ProTip!</strong> Use F9 to toggle the side by side view markdown editor.';
                var message12 = '<strong>ProTip!</strong> Use F11 to toggle the fullscreen view of the markdown editor.';

                var options = [
                                message1,
                                message2,
                                message3,
                                message4,
                                message5,
                                message6,
                                message7,
                                message8,
                                message9,
                                message10,
                                message11,
                                message12
                            ];

                notify(options[Math.floor(Math.random() * options.length)], 'inverse');
            }, 300)
        });
    });
</script>