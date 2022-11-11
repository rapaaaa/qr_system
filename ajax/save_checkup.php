<?php
	include '../core/config.php';
	$user_id 		= $_SESSION['user_id'];
	$app_id 		= $_POST['cu_app_id'];
	$service_id 	= $_POST['service_id'];
	$remarks 		= $mysqli->real_escape_string($_POST['remarks']);
	$prescription 	= $mysqli->real_escape_string($_POST['prescription']);
	$date_added 	= date("Y-m-d H:i:s");


	$fetch_checkup 	= $mysqli->query("SELECT * FROM check_ups WHERE app_id='$app_id'") or die(mysqli_error());
	$checkup_row 	= $fetch_checkup->fetch_array();

	if(mysqli_num_rows($fetch_checkup)>0){ //UPDATE
		$mysqli->query("UPDATE check_ups SET remarks = '$remarks', prescription = '$prescription', service_id = '$service_id' WHERE app_id = '$app_id' ") or die(mysql_error());
	}else{ //ADD
		$mysqli->query("INSERT INTO check_ups SET app_id = '$app_id', user_id = '$user_id', remarks = '$remarks', prescription = '$prescription',service_id = '$service_id', status='0', date_added = '$date_added'") OR die(mysql_error());
	}

	echo 1;
?>