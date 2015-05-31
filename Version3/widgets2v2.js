
 $(document).ready(function(){

	var table2 = $('#Uresults').dataTable({
	 	"dom": 'lfrtip',
        "tableTools": {
            "sRowSelect": "multi"
            }
 	});

 	//$("div.toolbar").html('<input type="submit" name="delete" value="Delete"><input type="submit" name="add" value="Add">');

        $("#add, #edit, #delete, #addTagsSubmit, #selectSubmitTag, #addReadersSubmit, #selectSubmitReader").button();
        $("button").button();
        $("#colour").selectmenu({ width : 'auto'});
        $("#addr, #name, #role").autocomplete();

/*    $("#tagForm").validate({
        rules: {
            "select[]": {
                required: true
            }/*,
            field2: {
                required: true
            }
        },
        submitHandler: function(form){}
    });

    $("#add").on('click', function(){
        $("#select[]").rules("remove");
        $("#tagForm").submit();
    });

    $('#button2').click(function(){
        $('[name="field3"], [name="field4"]').each(function(){
            $(this).rules('add', {
                required: true
            });
        });
        $("#myform").submit();  // validate and submit
    });*/
});
