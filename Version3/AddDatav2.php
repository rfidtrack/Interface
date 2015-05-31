<html>
    <head>
        <title>Adding Tag</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <script type="text/javascript" src="./widgets2v2.js"></script>
    <body bgcolor="#999999">
	<?php
		include '../credentials.php';

		$addr = $_POST['addr'];
		$name = $_POST['name'];
		$role = $_POST['role'];
		$color = $_POST['colour'];

		$link = mysqli_connect("$path", "$username", "$password", "$db");
		
		/* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}

		$query = "INSERT INTO lt_tag (addr, name, role, colour) VALUES ('$addr', '$name', '$role', '$color')";
		$result = mysqli_query($link, $query);
		if($result != NULL){

			$id = mysqli_insert_id($link);
			echo $id;
			echo "<h2>New Tag Added to the Database</h2>";
			echo "Mac Address: " . $addr . "<br/>";
			echo "Name: " . $name . "<br/>";
			echo "Role: " . $role . "<br/>";
			echo "Color: " . $color . "<br/>";
			echo "";
			
			//mysqli_free_result($result);
		}
		elseif (!$result) {
			printf("Error Message: %s\n", mysqli_error($link));
		}
		mysqli_close($link);
	?>
	<a href='usersV3.php'><button>Return</button></a>
	</body>
</html>
