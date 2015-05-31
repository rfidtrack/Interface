<html>
    <head>
        <title>Results View</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body bgcolor="#999999">
<?php include 'links.html';?>
<script type="text/javascript" src="./widgets.js"></script>
<?php

	$link = mysqli_connect("localhost", "root", "RfIdTr@cker", "rfid2");
	
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	if(isset($_POST['tag_id'])) 
	{
		$tag_id = $_POST['tag_id'];
		//foreach($tag_id as $i){echo $i . ' ';}
	}
	if(isset($_POST['reader_id']))
	{
		$reader_id = $_POST['reader_id'];
		//foreach ($reader_id as $i2){echo $i2 . ' ';}
	}
	//echo "<hr>";
	if($_POST['datepickerS'] != null)
	{
		$datepickerS = $_POST['datepickerS'];
		//echo "<br/>" . $datepickerS;
	}
	if($_POST['alternateS'] != null)
	{
   		$alternateS = $_POST['alternateS'];
   		//echo "<br/>" . $alternateS;
   	}
	if($_POST['timepickerS'] != null)
	{
		$timepickerS = $_POST['timepickerS'];
		//echo "<br/>" . $timepickerS;
		$convert = strtotime($timepickerS, $now = null);
		$format = "H:i";
		$timeS = date($format, $convert);
		//echo "<br/>" . $timeS;
	}
	//echo "<hr>";
	if($_POST['datepickerE'] != null)
	{
		$datepickerE = $_POST['datepickerE'];
		//echo "<br/>" . $datepickerE;
	}
	if($_POST['alternateE'] != null)
	{
	   $alternateE = $_POST['alternateE'];
		//echo "<br/>" . $alternateE;
	}
	if($_POST['timepickerE'] != null)
	{ 
	   $timepickerE = $_POST['timepickerE'];
		//echo "<br/>" . $timepickerE;
		$convert = strtotime($timepickerE, $now = null);
		$format = "H:i";
		$timeE = date($format, $convert);
		//echo "<br/>" . $timeE;
	}
	
	//Query Building//
	$rtable = 0;

	//Query with nothing selected
	if(isset($tag_id) == false && isset($reader_id) == false && $_POST['alternateS'] == null && $_POST['timepickerS'] == null && $_POST['alternateE'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test nothing selected';
	}
	
	//Query with just tag selection
	if(isset($tag_id) && isset($reader_id) == false && $_POST['alternateS'] == null && $_POST['timepickerS'] == null && $_POST['alternateE'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test tags';
	}

	//Query with just reader selection
	if(isset($reader_id) && isset($tag_id) == false && $_POST['alternateS'] == null && $_POST['timepickerS'] == null && $_POST['alternateE'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test readers';
	}	
	
	//Query with tag and reader selection
	if(isset($tag_id) && isset($reader_id) && $_POST['alternateS'] == null && $_POST['timepickerS'] == null && $_POST['alternateE'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test tags and readers';
	}

	//Query with just start date set
	if(isset($alternateS) && $_POST['timepickerS'] == null && $_POST['alternateE'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') >= '$alternateS' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start date';
	}
	
	//Query with just start time set
	if(isset($timepickerS) && $_POST['alternateS'] == null && $_POST['alternateE'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%H:%i') >= '$timeS' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start time';
	}
	
	//Query with just end date set
	if(isset($alternateE) && $_POST['timepickerS'] == null && $_POST['alternateS'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') <= '$alternateE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test end date';
	}

	//Query with just end time set
	if(isset($timepickerE) && $_POST['timepickerS'] == null && $_POST['alternateS'] == null && $_POST['alternateE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%H:%i') <= '$timeE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test end time';
	}
	
	//Query with start date and start time set
	if(isset($alternateS, $timepickerS) && $_POST['alternateE'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') >= '$alternateS' AND DATE_FORMAT(reported, '%H:%i') >= '$timeS' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start date and start time';
	}	
	
	//Query with end date and end time set
	if(isset($alternateE, $timepickerE) && $_POST['alternateS'] == null && $_POST['timepickerS'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') <= '$alternateE' AND DATE_FORMAT(reported, '%H:%i') <= '$timeE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test end date and end time';
	}	

	//Query with start date and end time set
	if(isset($alternateS, $timepickerE) && $_POST['alternateE'] == null && $_POST['timepickerS'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') >= '$alternateS' AND DATE_FORMAT(reported, '%H:%i') <= '$timeE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start date and end time';
	}

	//Query with end date and start time set
	if(isset($alternateE, $timepickerS) && $_POST['alternateS'] == null && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') <= '$alternateE' AND DATE_FORMAT(reported, '%H:%i') >= '$timeS' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test end date and start time';
	}

	//Query with start date and end date set
	if(isset($alternateS, $alternateE) && $_POST['timepickerE'] == null && $_POST['timepickerS'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') <= '$alternateE' AND DATE_FORMAT(reported, '%Y-%m-%d') >= '$alternateS' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start date and end date';
	}

	//Query with start time and end time set
	if(isset($timepickerS, $timepickerE) && $_POST['alternateS'] == null && $_POST['alternateE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%H:%i') >= '$timeS' AND DATE_FORMAT(reported, '%H:%i') <= '$timeE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start time and end time';
	}
	
	//Query with start date, start time, and end date set
	if(isset($alternateS, $timepickerS, $alternateE) && $_POST['timepickerE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') >= '$alternateS' AND DATE_FORMAT(reported, '%H:%i') >= '$timeS' AND DATE_FORMAT(reported, '%Y-%m-%d') <= '$alternateE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start date, start time, and end date';
	}	

	//Query with start date, end time, and end date set
	if(isset($alternateS, $timepickerE, $alternateE) && $_POST['timepickerS'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') >= '$alternateS' AND DATE_FORMAT(reported, '%H:%i') <= '$timeE' AND DATE_FORMAT(reported, '%Y-%m-%d') <= '$alternateE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start date, end time, and end date';
	}

	//Query with start date, start time, and end time set
	if(isset($alternateS, $timepickerS, $timepickerE) && $_POST['alternateE'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') >= '$alternateS' AND DATE_FORMAT(reported, '%H:%i') >= '$timeS' AND DATE_FORMAT(reported, '%H:%i') <= '$timeE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start date, start time, and end time';
	}

	//Query with start time, end time, and end date set
	if(isset($alternateE, $timepickerS, $timepickerE) && $_POST['alternateS'] == null)
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') <= '$alternateE' AND DATE_FORMAT(reported, '%H:%i') >= '$timeS' AND DATE_FORMAT(reported, '%H:%i') <= '$timeE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start time, end time, and end date';
	}

	//Query with start date, start time, end date, and end time set
	if(isset($alternateS, $alternateE, $timepickerS, $timepickerE))
	{
		$query = "SELECT lt_position.id AS Entry, tag_id, DATE_FORMAT(reported, '%W, %e %M, %Y') AS Date, DATE_FORMAT(reported, '%r')  AS Time, lt_reader.name AS Location
							 FROM lt_position
							 JOIN lt_reader
							 ON lt_position.xpos = lt_reader.xpos 
							 WHERE DATE_FORMAT(reported, '%Y-%m-%d') >= '$alternateS' AND DATE_FORMAT(reported, '%Y-%m-%d') <= '$alternateE' AND DATE_FORMAT(reported, '%H:%i') >= '$timeS' AND DATE_FORMAT(reported, '%H:%i') <= '$timeE' 
							 ORDER BY Entry";
		$rtable++;
		//echo '<br/>Test start date, start time, end date, and end time';
	}
	
//echo '<br/>'.$rtable;
	if($rtable == 1) {
		$result = mysqli_query($link, $query);
		echo '<center><h1>Entries in Database Matching Criteria Supplied</h1>';
		echo '<table id="tresults" class="display" cellspacing="0" width="100%">
					<thead><tr><th>Entry #</th><th>Tag ID</th><th>Date</th><th>Time</th><th>Location</th></tr></thead>
					<tfoot><tr><th>Entry #</th><th>Tag ID</th><th>Date</th><th>Time</th><th>Location</th></tr></tfoot><tbody>';
		while($row_sections = mysqli_fetch_array($result))
		{
			//Tag(s) selected but no location selected
			if(isset($tag_id) && in_array($row_sections['tag_id'], $tag_id) && isset($reader_id) == false) 
			{
		   		echo '<tr align="center"><td>' . $row_sections['Entry'] . '</td><td>' . $row_sections['tag_id'] . '</td><td>' . $row_sections['Date'] . '</td>
		    					  <td>' . $row_sections['Time'] . '</td><td>' . $row_sections['Location'] . '</td></tr>';
		   	}
		   	//Location(s) selected but no tag(s) selected
		   	elseif (isset($reader_id) && in_array($row_sections['Location'], $reader_id) && isset($tag_id) == false)
		   	{
		   		echo '<tr align="center"><td>' . $row_sections['Entry'] . '</td><td>' . $row_sections['tag_id'] . '</td><td>' . $row_sections['Date'] . '</td>
		    					  <td>' . $row_sections['Time'] . '</td><td>' . $row_sections['Location'] . '</td></tr>';
		   	}
		   	//Both Tag(s) and Location(s) selected
		   	elseif (isset($tag_id) && in_array($row_sections['tag_id'], $tag_id) && isset($reader_id) && in_array($row_sections['Location'], $reader_id))
		   	{
		   		echo '<tr align="center"><td>' . $row_sections['Entry'] . '</td><td>' . $row_sections['tag_id'] . '</td><td>' . $row_sections['Date'] . '</td>
		    					  <td>' . $row_sections['Time'] . '</td><td>' . $row_sections['Location'] . '</td></tr>';
		   	}
		   	//Neither Tag(s) nor Location(s) selected
		   	elseif(isset($tag_id) == false)
		   	{
				echo '<tr align="center"><td>' . $row_sections['Entry'] . '</td><td>' . $row_sections['tag_id'] . '</td><td>' . $row_sections['Date'] . '</td>
		    					 <td>' . $row_sections['Time'] . '</td><td>' . $row_sections['Location'] . '</td></tr>';					   
		   	}
		}	
		echo '</tbody></table></center>';
	}
	elseif($rtable > 1) {echo '<br/>two queries matched when only one should have.';}
	elseif ($rtable == 0) {echo '<br/>no queries matched when there should have been a match';}		
	echo '<div id="tesTime23"></div>'
	//mysqli_close($link);

?>
<div id="editor" align="center">
	<a href="Initial_v3.php"><button id="editors">Main Menu</button></a>
</div>
</body>
</html>
