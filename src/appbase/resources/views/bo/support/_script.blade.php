<script>
    flatpickr(".date", {
        enableTime: true,
        dateFormat: "{{ config('a1.datejs.datetime') }}"
    });
    //CKEDITOR.replace( 'description' );
    
$(document).ready(function() {

    $('.select2').select2();
    var $tasktype_id = $('#tasktype_id');
    var tasktype_id = $tasktype_id.val();
    
    var $tasksubtype1_id = $('#tasksubtype1_id');
    var tasksubtype1_id_url = "{{ route('subcategory.json', ['tasktype' => 'inject']) }}";
    var url = tasksubtype1_id_url.replace("inject", $tasktype_id.val());

    alert($tasktype_id.val());
    $tasksubtype1_id.empty().select2({
        ajax: {
            url: url,
            dataType: 'json'
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
    });


    $tasktype_id.on("select2:select", function (e) { 

        var url = tasksubtype1_id_url.replace("inject",$tasktype_id.val());
        $tasksubtype1_id.empty().select2({
            ajax: {
                url: url,
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

    });
    
    

});    
    

</script>

