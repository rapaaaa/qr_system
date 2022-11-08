<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM check_ups ORDER BY date_added DESC") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 				= $count++;
		$list['cu_id'] 				= $row['cu_id'];
		$list['patient'] 			= $row['app_id'];
		$list['user_id'] 			= $row['user_id'];
		$list['remarks'] 			= $row['remarks'];
		$list['status'] 			= getStatusDisplay($row['status']);
		$list['date_added'] 		= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>