<html>
    <head>
        <title>Tag Editor</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <!--<script type="text/javascript" src="./widgets2v2.js"></script>-->
    <body bgcolor="#999999">
	<?php
		include 'links.html';
		include 'credentials.php';
		$link = mysqli_connect("$path", "$username", "$password", "$db");
				
		/* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
		if (isset($_POST['delete']))
		{
			
			if (!isset($_POST['select']))
			{
				echo "<h2>No Selections Made</h2>";
			}

			elseif (isset($_POST['select']))
			{
				$id = $_POST['select'];

				for ($i=0; $i < count($id) ; $i++)
				{
					$query = "DELETE FROM lt_tag WHERE id='$id[$i]'";
					$result = mysqli_query($link, $query);
					if($result){

						echo "<h2>Record with id $id[$i] deleted successfully</h2><br/>";
					}
					elseif (!$result) {
						printf("Error Message: %s\n", mysqli_error($link));
					}
				}
				mysqli_close($link);
			}
			echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
			echo "<a href='usersV3.php'><button>Return</button></a>";
		}

		elseif (isset($_POST['add']))
		{
			include 'addTags.html';
		}

		elseif (isset($_POST['edit']))
		{
			if (!isset($_POST['select']))
			{
				echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
				echo "<h2>No Selections Made</h2>";
				echo "<a href='usersV3.php'><button>Return</button></a>";
			}

			elseif (isset($_POST['select']))
			{
				$id = $_POST['select'];

				if (count($id) > 1)
				{
					echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
					echo "<h2>Please select only one entry to edit at a time</h2>";
					echo "<a href='usersV3.php'><button>Return</button></a>";
				}
				elseif (count($id) == 1)
				{
					for ($i=0; $i < count($id) ; $i++)
					{
						echo '<center><form name="editForm" action="EditDataTag.php" method="post">';

						$query = "SELECT addr, name, role, colour FROM lt_tag WHERE id='$id[$i]'";
						$result = mysqli_query($link, $query);
						if($result)
						{
							while($row_sections = mysqli_fetch_array($result))
							{
								echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
							    echo '<label for="addr">Mac Address</label><br /><input type="text" name="addr" value="' . $row_sections['addr'] . '"><br/>' . 
							    '<label for="name">Person Assigned</label><br /><input type="text" name="name" value="' . $row_sections['name'] . '"><br/>' .
							    '<label for="role">Role</label><br /><input type="text" name="role" value="' . $row_sections['role'] . '"><br/>' .
							    '<label for="colour">Color</label><br />
							    <select id="colour" name="colour">
							    <option value="' . $row_sections['colour'] . '">Current</option>
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
			        			</select><br />
							    <input type="hidden" name="id" value="' . $id[$i] . '"><br/>';
							}
						}
						elseif (!$result)
						{
							printf("Error Message: %s\n", mysqli_error($link));
						}
						echo '<script type="text/javascript" src="./widgets2v2.js"></script>';
						echo '<input type="submit" id="selectSubmitTag" value="Submit Edits"></form>';
						echo "<a href='usersV3.php'><button>Cancel</button></a></center>";
					}
					mysqli_close($link);
				}
			}
		}
	?>
	</body>
</html>
