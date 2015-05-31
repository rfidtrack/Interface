<html>
    <head>
        <title>Editing Reader</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <script type="text/javascript" src="./widgets2v2.js"></script>
    <body bgcolor="#999999">
	<?php
		include 'credentials.php';

		$id = $_POST['id'];
		$addr = $_POST['addr'];
		$name = $_POST['name'];

		$link = mysqli_connect("$path", "$username", "$password", "$db");
		
		/* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}

		$query = "UPDATE lt_reader SET addr = '$addr',
									   name = '$name'
								   WHERE id = '$id'";
		$result = mysqli_query($link, $query);
		if($result != NULL){

			echo "Edits Submitted";
			echo '<META http-equiv="refresh" content="2;URL=readers.php">';

			/*$id = mysqli_insert_id($link);
			echo $id;
			echo "<h2>New Tag Added to the Database</h2>";
			echo "Mac Address: " . $addr . "<br/>";
			echo "Name: " . $name . "<br/>";
			echo "Role: " . $role . "<br/>";
			echo "Color: " . $color . "<br/>";
			echo "";*/
			
			//mysqli_free_result($result);
		}
		elseif (!$result) {
			printf("Error Message: %s\n", mysqli_error($link));
			echo '<br/><a href="readers.php"><button>Return</button></a>';
		}
		mysqli_close($link);
	?>
	</body>
</html>
