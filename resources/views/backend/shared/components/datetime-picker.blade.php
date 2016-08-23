<script>
  (function(){
    $('.datetime-picker').datetimepicker({
        format: '{{ $format or "YYYY-MM-DD HH:mm:ss" }}',
        defaultDate: Date.now(),
        keepOpen: true
    });
  })()
</script>
