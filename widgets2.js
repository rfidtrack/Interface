
 $(document).ready(function(){

	var table2 = $('#Uresults').dataTable({
	 	//"dom": 'T<"clear">lfrtip',
	 	"bJQueryUI": true,
		"bProcessing": true,
        "tableTools": {
            //"sRowSelect": "single"
        }/*,
	 	"aoColumns": [
                                {
                                    sName: "id"
                                },
                                {
                                    sName: "addr"
                                }, 
                                {
                                    sName: "name"
                                },
                                {
                                    sName: "role"
                                },
                                {
                                	sName: "colour"
                                }
                              ] 
*/

 	}).makeEditable({
 		sUpdateURL: "./UpdateData.php",
 		sDeleteURL: "./DeleteData.php",
 		sDeleteHttpMethod: "POST",
 		"sAddURL": "./AddData.php",
 		"sAddHttpMethod": "GET",
 		oAddNewRowButtonOptions: {	label: "Add...",
									icons: {primary:'ui-icon-plus'} 
									},
		oDeleteRowButtonOptions: {	label: "Remove", 
									icons: {primary:'ui-icon-trash'}
									},
 		sAddDeleteToolbarSelector: ".dataTables_length",
 		oAddNewRowFormOptions: { 	
                            title: 'Add tag / Assign User',
							show: "clip",
							hide: "clip",
                            modal: true
						},
 		});

 	$("div.add_delete_toolbar").html('');
});
