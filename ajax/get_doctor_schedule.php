<?php
	include '../core/config.php';

	$ds_id 	= $_POST['ds_id'];
	$fetch_user = $mysqli->query("SELECT * FROM doctor_schedule WHERE ds_id = '$ds_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
		$list['ds_id'] = $row['ds_id'];
		$list['user_id'] = $row['user_id'];
		$list['description'] = $row['description'];
		$list['max_residents'] = $row['max_residents'];
		$list['date'] = $row['date'];
		$list['start_time'] = $row['start_time'];
		$list['end_time'] = $row['end_time'];

		array_push($response, $list);
	}

	echo json_encode($response);