<script>
    flatpickr(".date", {
        enableTime: true,
        dateFormat: "{{ config('a1.datejs.datetime') }}"
    });
    //CKEDITOR.replace( 'description' );
    
$(document).ready(function() {
    var $tasktype_id = $('#tasktype_id');
    $('.select2').select2();
    
    $tasktype_id.on("select2:select", function (e) {
        alert('halo');
    });
});    
    

</script>

