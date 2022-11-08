<?php
	include '../core/config.php';
	$date = date('Y-m-d');
	$fetch_appointments = $mysqli->query("SELECT MAX(queue_number) FROM appointments WHERE status='0' AND date_format(date_added, '%Y-%m-%d')='$date'") or die(mysqli_error());
	$count_data = mysqli_num_rows($fetch_appointments);
	if($count_data==0){
		echo 1;
	}else{
		$row = $fetch_appointments->fetch_array();
		echo $row[0]+1;
	}