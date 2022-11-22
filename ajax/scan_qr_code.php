<?php
	include '../core/config.php';
	$date 		= date('Y-m-d');
	$qr_number 	= $_POST['qr_number'];
	//Note: if user_id==0 pending appointment
	$fetch 		= $mysqli->query("SELECT app_id FROM appointments WHERE patient_id='$qr_number'  AND user_id!='0' AND status='0' AND date_format(app_time, '%Y-%m-%d')='$date'") or die(mysqli_error());
	$row 		= $fetch->fetch_array();

	echo $row['app_id'];
	