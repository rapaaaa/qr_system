<?php
	include '../core/config.php';

	if(isset($_POST['date'])){
		$user_id 		= $_SESSION['user_id'];
		$description 	= $mysqli->real_escape_string($_POST['description']);
		$max_residents 	= $mysqli->real_escape_string($_POST['max_residents']);
		$date 			= $mysqli->real_escape_string($_POST['date']);
		$start_time 	= $mysqli->real_escape_string($_POST['start_time']);
		$end_time 		= $mysqli->real_escape_string($_POST['end_time']);
		$date_added 	= $system_date;

		$sql = $mysqli->query("INSERT INTO doctor_schedule SET user_id = '$user_id',description='$description',max_residents='$max_residents', date = '$date', start_time = '$start_time', end_time = '$end_time', date_added = '$date_added'") OR die(mysql_error());
		
		echo 1;
	}
	
?>