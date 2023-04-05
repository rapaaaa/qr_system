<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM doctor_schedule ORDER BY date DESC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 			= $count++;
		$list['ds_id'] 			= $row['ds_id'];
		$list['name'] 			= userFullName($row['user_id']);
		$list['description'] 	= $row['description'];
		$list['max_residents'] 	= $row['max_residents'];
		$list['date'] 			= date("F j, Y ",strtotime($row['date']));
		$list['start_time'] 	= date("h:i A",strtotime($row['start_time'])); 
		$list['end_time'] 		= date("h:i A",strtotime($row['end_time'])); 
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>