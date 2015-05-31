<html>
    <head>
        <title>Reader Editor</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <!--<script type="text/javascript" src="./widgets2v2.js"></script>-->
    <body bgcolor="#999999">
	<?php
		include 'links.html';
		if (isset($_POST['delete']))
		{
			
			if (!isset($_POST['select']))
			{
				echo "<h2>No Selections Made</h2>";
			}

			elseif (isset($_POST['select']))
			{
				$id = $_POST['select'];
				$link = mysqli_connect("localhost", "root", "RfIdTr@cker", "rfid2");
				
				/* check connection */
				if (mysqli_connect_errno()) {
				    printf("Connect failed: %s\n", mysqli_connect_error());
				    exit();
				}

				for ($i=0; $i < count($id) ; $i++)
				{
					$query = "DELETE FROM lt_reader WHERE id='$id[$i]'";
					$result = mysqli_query($link, $query);
					if($result){

						echo "<h2>Reader with id $id[$i] deleted successfully</h2>";
					}
					elseif (!$result) {
						printf("Error Message: %s\n", mysqli_error($link));
					}
				}
				mysqli_close($link);
			}
			echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
			echo "<a href='readers.php'><button>Return</button></a>";
		}

		elseif (isset($_POST['add']))
		{
			include 'links.html';
			include 'addReaders.html';
		}

		elseif (isset($_POST['edit']))
		{
			if (!isset($_POST['select']))
			{
				echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
				echo "<h2>No Selections Made</h2>";
				echo "<a href='readers.php'><button>Return</button></a>";
			}

			elseif (isset($_POST['select']))
			{
				$id = $_POST['select'];

				if (count($id) > 1)
				{
					echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
					echo "<h2>Please select only one entry to edit at a time</h2>";
					echo "<a href='readers.php'><button>Return</button></a>";
				}
				elseif (count($id) == 1)
				{
					$link = mysqli_connect("localhost", "root", "RfIdTr@cker", "rfid2");
						
					/* check connection */
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

					for ($i=0; $i < count($id) ; $i++)
					{
						 //echo $id[$i] . '<br/>';
						echo '<center><form name="editForm" action="EditDataReader.php" method="post">';

						$query = "SELECT addr, name FROM lt_reader WHERE id='$id[$i]'";
						$result = mysqli_query($link, $query);
						if($result)
						{
							while($row_sections = mysqli_fetch_array($result))
							{
								echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
							    echo '<label for="addr">Mac Address</label><br /><input type="text" name="addr" value="' . $row_sections['addr'] . '"><br/>' . 
							    '<label for="name">Person Assigned</label><br /><input type="text" name="name" value="' . $row_sections['name'] . '"><br/>' .
							    '<input type="hidden" name="id" value="' . $id[$i] . '"><br/>';
							}
						}
						elseif (!$result)
						{
							printf("Error Message: %s\n", mysqli_error($link));
						}
						echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
						echo '<input type="submit" id="selectSubmitReader" value="Submit Edits"></form>';
						echo "<a href='readers.php'><button>Cancel</button></a></center>";
					}
					mysqli_close($link);
				}
			}
		}
	?>
	</body>
</html>
