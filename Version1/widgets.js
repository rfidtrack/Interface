$(document).ready(function(){
	$("#tag_id").multiselect({
		selectedList: 5,
		noneSelectedText: "Select Tag(s)",
		selectedText: "# of # selected"
	});
	$("#reader_id").multiselect({
		selectedList: 5,
		noneSelectedText: "Select Location(s)",
		selectedText: "# of # selected"
	});
	$("#datepickerS").datepicker({
		dateFormat: "DD, d MM, yy",
		altField: "#alternateS",
		altFormat: "yy-mm-dd",
		showButtonPanel: true,
		changeMonth: true,
		changeYear: true,
		//gotoCurrent: true,
		 onClose: function(selectedDate) {
		$("#datepickerE").datepicker("option", "minDate", selectedDate);
		}
	});
	$("#datepickerE").datepicker({
		dateFormat: "DD, d MM, yy",
		altField: "#alternateE",
		altFormat: "yy-mm-dd",
		showButtonPanel: true,
		changeMonth: true,
		changeYear: true,
		//gotoCurrent: true,
		onClose: function(selectedDate) {
		$("#datepickerS").datepicker("option", "maxDate", selectedDate);
		}
	});
	$('#timepickerS').timepicker({
		hourGrid: 4,
		minuteGrid: 10,
		timeFormat: 'hh:mm tt'
	});
	$('#timepickerE').timepicker({
		hourGrid: 4,
		minuteGrid: 10,
		timeFormat: 'hh:mm tt'
	});
	
	$('#tresults tfoot th').each(function() {
        var title = $('#tresults thead th').eq($(this).index()).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    });
	var table = $('#tresults').DataTable({
     "dom": 'lfTrtip<"clear">',
     /*"colReorder": {
            "realtime": "true"
        	},*/
     "tableTools": {
     		"sSwfPath": "./MSDL/DataTables-1.10.5/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
     		"sRowSelect": "multi",
     		"aButtons": [{
                    "sExtends": "collection",
                    "sButtonText": "Save",
                    "aButtons": ["csv", "pdf"]
                				},"copy", "print"]
     		}
	 });
	 table.columns().eq(0).each(function(colIdx){
        $('input', table.column(colIdx).footer()).on('keyup change', function(){
            table
                .column(colIdx)
                .search(this.value)
                .draw();
        });
     });
	 $("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');
	 $("#tag1, #tag2").button();
	 $("button").button();
	 //new $.fn.dataTable.FixedHeader(table);
	 //new $.fn.dataTable.FixedFooter(table);

});


function clearValueS() {
	document.getElementById("datepickerS").value=null;
	document.getElementById("alternateS").value=null;
	}
function TclearValueS() {
	document.getElementById("timepickerS").value=null;
	document.getElementById("talternateS").value=null;
}
function clearValueE() {
	document.getElementById("datepickerE").value='';
	document.getElementById("alternateE").value='';
	}
function TclearValueE() {
	document.getElementById("timepickerE").value='';
	document.getElementById("talternateE").value='';
}
