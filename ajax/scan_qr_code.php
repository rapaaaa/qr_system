<?php
	include '../core/config.php';
	$date 		= date('Y-m-d');
	$qr_number 	= $_POST['qr_number'];
	
	$fetch 		= $mysqli->query("SELECT app_id FROM appointments WHERE patient_id='$qr_number' AND status='0' AND date_format(date_added, '%Y-%m-%d')='$date'") or die(mysqli_error());
	$row 		= $fetch->fetch_array();

	echo $row['app_id'];
	