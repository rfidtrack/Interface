<html>
    <head>
        <title>Initial View</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/dark-hive/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="./MSDL/jquery.multiselect.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	 <script type="text/javascript" src="./MSDL/jquery.multiselect.js"></script>
	 <script type="text/javascript" src="./widgets.js"></script>
    
    
    
    
<!--<link rel="stylesheet" type="text/css" href="../../jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../src/jquery.multiselect.js"></script>    

-->
<div align="center">
<h1>Select desired tags</h1>
<body bgcolor="#999999">
<form action="results.php" method="post" style="margin-top:20px">    
<select id="tag_id" name="tag_id[]" multiple="multiple">
<option value="1">Option 1</option>
<option value="2">Option 2</option>
<option value="3">Option 3</option>
<option value="4">Option 4</option>
<option value="5">Option 5</option>
<option value="6">Option 6</option>
<option value="7">Option 7</option>
<option value="8">Option 8</option>
<option value="9">Option 9</option>
<option value="10">Option 10</option>
</select>
</div>

<div id="start_date" style="float: left;">
	<h2>Start Date:</h2>
		<select id="monthS" name="monthS" onchange="checkDayOfMonthS()">
		<option value="0">Month (None)</option>
		<option value="January">January</option>
		<option value="Feburary">Feburary</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
		</select>
		
		<b>/</b>
		
		<select id="dayS" name="dayS">
		<option value='0'>Day (None)</option>
		
		<?php
			for($day = 1; $day <= 31; $day++) 
			{
				echo "<option value='". $day . "'>" . $day . "</option>";
			}
		?>
		</select>
		
		<b>/</b>
		
		<select id="yearS" name="yearS">
		<option value='0'>Year (None)</option>
		<option value='2015'>2015</option>
		<option value='2016'>2016</option>
		<option value='2017'>2017</option>
		<option value='2018'>2018</option>
		<option value='2019'>2019</option>
		<option value='2020'>2020</option>
		</select>
		
	<h2>Start Time:</h2>
	
		<select id="hourS" name="hourS">
		<option value='25'>Hour (None)</option>
		
		<?php
			for($hour = 0; $hour <= 23; $hour++) 
			{
				if($hour == 0) {echo "<option value='". $hour . "'>" . ($hour+12) . "am</option>";}
				elseif($hour < 12) {echo "<option value='". $hour . "'>" . $hour . "am</option>";}
				elseif($hour == 12) {echo "<option value='". $hour . "'>" . $hour . "pm</option>";}
				elseif($hour > 12) {echo "<option value='". $hour . "'>" . ($hour-12) . "pm</option>";}
			}
		?>
		</select>
		
		<b>:</b>

		<select id="minuteS" name="minuteS">
		<option value='0'>Minute (None)</option>
		
		<?php
			for($minute = 1; $minute <= 59; $minute++) 
			{
				if($minute < 10) {echo "<option value='". $minute . "'>0" . $minute . "</option>";}
				else{echo "<option value='". $minute . "'>" . $minute . "</option>";}
			}
		?>
		</select>		
</div>

<div id="end_date" style="float: right;">
	<h2>End Date:</h2>
		<select id="monthE" name="monthE" onchange="checkDayOfMonthE()">
		<option value="0">Month (None)</option>
		<option value="January">January</option>
		<option value="Feburary">Feburary</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="November">November</option>
		<option value="December">December</option>
		</select>
		
		<b>/</b>
		
		<select id="dayE" name="dayE">
		<option value='0'>Day (None)</option>
		
		<?php
			for($day = 1; $day <= 31; $day++) 
			{
				echo "<option value='". $day . "'>" . $day . "</option>";
			}
		?>
		</select>
		
		<b>/</b>
		
		<select id="yearE" name="yearE">
		<option value='0'>Year (None)</option>
		<option value='2015'>2015</option>
		<option value='2016'>2016</option>
		<option value='2017'>2017</option>
		<option value='2018'>2018</option>
		<option value='2019'>2019</option>
		<option value='2020'>2020</option>
		</select>
	<h2>End Time:</h2>
	
		<select id="hourE" name="hourE">
		<option value='25'>Hour (None)</option>
		
		<?php
			for($hour = 0; $hour <= 23; $hour++) 
			{
				if($hour == 0) {echo "<option value='". $hour . "'>" . ($hour+12) . "am</option>";}
				elseif($hour < 12) {echo "<option value='". $hour . "'>" . $hour . "am</option>";}
				elseif($hour == 12) {echo "<option value='". $hour . "'>" . $hour . "pm</option>";}
				elseif($hour > 12) {echo "<option value='". $hour . "'>" . ($hour-12) . "pm</option>";}
			}
		?>
		</select>
		
		<b>:</b>

		<select id="minuteE" name="minuteE">
		<option value='0'>Minute (None)</option>
		
		<?php
			for($minute = 1; $minute <= 59; $minute++) 
			{
				if($minute < 10) {echo "<option value='". $minute . "'>0" . $minute . "</option>";}
				else{echo "<option value='". $minute . "'>" . $minute . "</option>";}
				
			}
		?>
		</select>	
</div>
<br/>

<br/>
<div align="center"><input type="submit" value="Submit" /></div>
</form>
</body>
