<html>
    <head>
        <title>Add/Edit/Delete User View</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body bgcolor="#999999">

<?php include 'links.html';?>
<script type="text/javascript" src="./widgets2.js"></script>

<!-- <button id="btnAddNewRow">Add new tag...</button> -->
<form id="formAddNewRow" action="#" title="Add tag / Assign User" style="width:600px;min-width:600px">
<input type="hidden" name="id" id="id" rel="0" />
    <label for="addr">Mac Address</label><br />
		<input type="text" name="addr" id="addr" class="required" rel="1" />
        <br />
    <label for="name">Person Assigned</label><br />
		<input type="text" name="name" id="name" rel="2" />
        <br />
    <label for="role">Role</label><br />
    	<input type="text" name="role" id="role" rel="3"><br />
	<label for="colour">Color</label><br />
    	<select name="colour" id="colour" rel="4" />
    		<option value="#FF0000">Red</option>
    		<option value="#800000">Maroon</option>
    		<option value="#FFFF00">Yellow</option>
    		<option value="#808000">Olive</option>
    		<option value="#00FF00">Lime</option>
    		<option value="#008000">Green</option>
    		<option value="#00FFFF">Aqua</option>
    		<option value="#008080">Teal</option>
    		<option value="#0000FF">Blue</option>
    		<option value="#000080">Navy</option>
    		<option value="#FF00FF">Fuchsia</option>
    		<option value="#800080">Purple</option>
		</select>
    	<!-- <br />
    <label for="version">Engine version</label><br />
		<select name="version" id="version" rel="3">
                <option>1.5</option>
                <option>1.7</option>
                <option>1.8</option>
        </select>
        <br />
    <label for="grade">CSS grade</label><br />
		<input type="radio" name="grade" value="A" rel="4"> First<br>
		<input type="radio" name="grade" value="B" rel="4"> Second<br>
		<input type="radio" name="grade" value="C" checked rel="4"> Third
        <br /> -->
</form>

<?php

	$link = mysqli_connect("localhost", "root", "RfIdTr@cker", "rfid2");
	
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	$query = "SELECT * FROM lt_tag ORDER BY id";
	$result = mysqli_query($link, $query);
	echo '<center><h1>Tags Currently assigned in the system</h1>';
	echo '<table id="Uresults" class="display" cellspacing="0" width="100%">
					<thead><tr><th>Tag ID #</th><th>Tag MAC Addr</th><th>Person Assigned</th><th>Role</th><th>Color</th></tr></thead><tbody>';
					// <tfoot><tr><th>Tag ID #</th><th>Tag MAC Addr</th><th>Person Assigned</th><th>Role</th><th>Color</th></tr></tfoot>
	while($row_sections = mysqli_fetch_array($result))
	{
	    echo '<tr align="center" id=' . $row_sections['id'] . '><td>' . $row_sections['id'] . '</td><td>' . $row_sections['addr'] . '</td><td>' . $row_sections['name'] . '</td>
			  <td>' . $row_sections['role'] . '</td><td>' . $row_sections['colour'] . '</td></tr>';
	}

	echo '</table></center>';
	//mysqli_close($link);

?>
	</body>
</html>