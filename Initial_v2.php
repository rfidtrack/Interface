<html>
    <head>
        <title>Initial View</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>

    <?php include 'links.html';?>
    <script type="text/javascript" src="./widgets.js"></script>
       
<div align="center">
<h1>Select desired tags</h1>
<body bgcolor="#999999">
<form action="results.php" method="post" style="margin-top:20px">    
<select id="tag_id" name="tag_id[]" multiple="multiple">
<?php
		$link = mysqli_connect("localhost", "root", "RfIdTr@cker", "rfid2");
	
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	
	
	$query = "SELECT id FROM lt_tag ORDER BY id";
	$result = mysqli_query($link, $query);
		//$row = mysqli_num_rows($result);

	while($row_sections = mysqli_fetch_array($result))
	{
	    echo '<option value="' . $row_sections['id'] . '">' . $row_sections['id'] . '</option>';
	}
	//mysqli_close($link);	
?>
</select>
</div>

<div id="start_date" style="float: left;">
	<h2>Start Date:</h2>
			Date: <input type="text" id="datepickerS" name="datepickerS" readonly>&nbsp;
			<input type="button" id="clear_sd" name="clear_sd" value="Clear" onclick="clearValueS()">
			<input type="hidden" id="alternateS" name="alternateS" value="">
	<h2>Start Time:</h2>

			Time: <input type="text" id="timepickerS" name="timepickerS" readonly>&nbsp;
			<input type="button" id="clear_st" name="clear_st" value="Clear" onclick="TclearValueS()">
			<input type="hidden" id="talternateS" name="talternateS" value="">
</div>

<div id="end_date" style="float: right;">
	<h2>End Date:</h2>
			Date: <input type="text" id="datepickerE" name="datepickerE" readonly>&nbsp;
			<input type="button" id="clear_ed" name="clear_ed" value="Clear" onclick="clearValueE()">
			<input type="hidden" id="alternateE" name="alternateE">
	<h2>End Time:</h2>
	
			Time: <input type="text" id="timepickerE" name="timepickerE" readonly>&nbsp;
			<input type="button" id="clear_et" name="clear_et" value="Clear" onclick="TclearValueE()">
			<input type="hidden" id="talternateE" name="talternateE" value="">
</div>
<br/>

<br/>
<div align="center"><input type="submit" value="Submit" /></div>
</form>
</body>
</html>