<html>
    <head>
        <title>Adding Reader</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <script type="text/javascript" src="./widgets2v2.js"></script>
    <body bgcolor="#999999">
	<?php
		include 'credentials.php';

		$addr = $_POST['addr'];
		$name = $_POST['name'];

		$link = mysqli_connect("$path", "$username", "$password", "$db");
		
		/* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}

		$query2 = "SELECT MAX(xpos) AS maxx, MAX(ypos) AS maxy FROM lt_reader";
		$result2 = mysqli_query($link, $query2);
		while($rows = mysqli_fetch_array($result2))
		{
			$maxx = $rows['maxx'] + 1;
			$maxy = $rows['maxy'] + 1;
		}
		$query = "INSERT INTO lt_reader (addr, name, map_id, xpos, ypos) VALUES ('$addr', '$name', '10', '$maxx', '$maxy')";
		$result = mysqli_query($link, $query);
		if($result != NULL){

			$id = mysqli_insert_id($link);
			echo "<h2>New Reader Added to the Database</h2>";
			echo "ID: " . $id . "<br/>";
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
