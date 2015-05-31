<html>
    <head>
        <title>Adding Reader</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <script type="text/javascript" src="./widgets2v2.js"></script>
    <body bgcolor="#999999">
	<?php

		$addr = $_POST['addr'];
		$name = $_POST['name'];

		$link = mysqli_connect("localhost", "root", "RfIdTr@cker", "rfid2");
		
		/* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}

		$query = "INSERT INTO lt_reader (addr, name, map_id) VALUES ('$addr', '$name', '10')";
		$result = mysqli_query($link, $query);
		if($result != NULL){

			$id = mysqli_insert_id($link);
			echo $id;
			echo "<h2>New Reader Added to the Database</h2>";
			echo "Mac Address: " . $addr . "<br/>";
			echo "Location Name: " . $name . "<br/>";
			echo "";
			
			//mysqli_free_result($result);
		}
		elseif (!$result) {
			printf("Error Message: %s\n", mysqli_error($link));
		}
		mysqli_close($link);
	?>
	<a href='readers.php'><button>Return</button></a>
	</body>
</html>
