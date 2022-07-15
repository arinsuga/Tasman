<script>
    flatpickr(".date", {
        enableTime: true,
        dateFormat: "{{ config('a1.datejs.datetime') }}"
    });
    //CKEDITOR.replace( 'description' );
    
function HtmlTOExcel(type, fun, dl) {
    var elt = document.getElementById('filter');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
    return dl ?
        XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
        XLSX.writeFile(wb, fun || ('student-recored.' + (type || 'xlsx')));
}


var specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '.no-export': function (element, renderer) {
        // true = "handled elsewhere, bypass text extraction"
        return true;
    }
};

function exportPDF(id) {
    var doc = new jsPDF('l', 'pt', 'a4');
    //A4 - 595x842 pts
    //https://www.gnu.org/software/gv/manual/html_node/Paper-Keywords-and-paper-size-in-points.html


    //Html source 
    var source = document.getElementById(id);
console.log(source);
    var margins = {
        top: 10,
        bottom: 10,
        left: 10,
        width: 595
    };

    doc.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left,
        margins.top, {
            'width': margins.width,
            'elementHandlers': specialElementHandlers
        },

        function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF 
            //          this allow the insertion of new lines after html
            doc.save('Test.pdf');
        }, margins);
}

$(document).ready(function() {

    $('.select2').select2();
    var $tasktype_id = $('#tasktype_id');
    
    //init tasksubtype1
    var $tasksubtype1_id = $('#tasksubtype1_id');
    var tasksubtype1_id_url = "{{ route('subcategory.json', ['tasktype' => 'inject']) }}";
    var url1 = tasksubtype1_id_url.replace("inject", $tasktype_id.val());
    $tasksubtype1_id.empty().select2({
        ajax: {
            url: url1,
            dataType: 'json'
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
    }); //end action

    //event takstype
    $tasktype_id.on("select2:select", function (e) { 

        //tasksubtype1
        var url = tasksubtype1_id_url.replace("inject",$tasktype_id.val());
        $tasksubtype1_id.empty().select2({
            ajax: {
                url: url,
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        //tasksubtype2 set empty
        $tasksubtype2_id.empty().select2();
    }); //end event
    
    //event tasksubtype1
    var $tasksubtype2_id = $('#tasksubtype2_id');
    var tasksubtype2_id_url = "{{ route('item.json', ['tasktype' => 'inject1', 'tasksubtype1' => 'inject2']) }}";
    $tasksubtype1_id.on("select2:select", function (e) { 

        var url = tasksubtype2_id_url
            .replace("inject1", $tasktype_id.val())
            .replace("inject2", $tasksubtype1_id.val());
        $tasksubtype2_id.empty().select2({
            ajax: {
                url: url,
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
        
    }); //end event
    

});    
    

</script>

