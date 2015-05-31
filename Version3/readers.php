<html>
    <head>
        <title>Add/Edit/Delete Reader View</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body bgcolor="#999999">

<?php include 'links.html'; include '../credentials.php';?>
<script type="text/javascript" src="./widgets2v2.js"></script>

<center><h1>Readers Currently Active in the System</h1>
    <form name="readerForm" action="selectReader.php" method="post">
          <input type="submit" id="add" name="add" value="Add">
          <input type="submit" id="edit" name="edit" value="Edit">
          <input type="submit" id="delete" name="delete" value="Delete">
                <table id="Uresults" class="display" cellspacing="0" width="100%">
                    <thead><tr><th>ID</th><th>Mac Address</th><th>Location Name</th><th>Select</th></tr></thead>
                    <tfoot><tr><th>ID</th><th>Mac Address</th><th>Location Name</th><th>Select</th></tr></tfoot><tbody>

<?php

	$link = mysqli_connect("$path", "$username", "$password", "$db");
	
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	$query = "SELECT id, addr, name FROM lt_reader ORDER BY id";
	$result = mysqli_query($link, $query);
    
	while($row_sections = mysqli_fetch_array($result))
	{
	    echo '<tr align="center" id=' . $row_sections['id'] . '><td>' . $row_sections['id'] . '</td><td>' . $row_sections['addr'] . '</td>
                                                                <td>' . $row_sections['name'] . '</td><td><input type="checkbox" name="select[]" value="' . $row_sections['id'] . '"></td></tr>';
	}
	mysqli_close($link);

?>
        </tbody></table></form>
        <div id="editor" align="center">
            <a href="Initial_v3.php"><button>Main Menu</button></a>
        </div>
        </center>
	</body>
</html>
