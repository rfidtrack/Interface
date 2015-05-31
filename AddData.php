<?php

	$addr = $_REQUEST['addr'];
	$name = $_REQUEST['name'];
	$role = $_REQUEST['role'];
	$color = $_REQUEST['colour'];

	$link = mysqli_connect("localhost", "root", "RfIdTr@cker", "rfid2");
	
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	$query = "INSERT INTO lt_tag (addr, name, role, colour) VALUES ($addr, $name, $role, $color)";
	$result = mysqli_query($link, $query);
	if($result != $null){

		$id = mysqli_insert_id($link);
		echo $id;
		echo $addr;
		echo $name;
		echo $role;
		echo $colour;
		
		mysqli_free_result($result);
	}
	elseif (!$result) {
		printf("Error Message: %s\n", mysqli_error($link));
	}
	mysqli_close($link);
?>