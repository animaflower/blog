<div id="{{ $section }}" data-field-message="{{ Session::get($section) }}"></div>

<script type="text/javascript">
    $(document).ready(function(){
        $(window).load(function(){
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
                var message = $("#{{ $section }}").data("field-message");
                notify(message, 'inverse');
            }, 300)
        });
    });
</script>
