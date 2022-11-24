<?php
	include '../core/config.php';
	$date = date("Y-m-d",strtotime($_POST['appointment_time']));
	$fetch_appointments = $mysqli->query("SELECT MAX(queue_number) FROM appointments WHERE date_format(app_time, '%Y-%m-%d')='$date'") or die(mysqli_error());
	$row = $fetch_appointments->fetch_array();
	echo $row[0]+1;
	