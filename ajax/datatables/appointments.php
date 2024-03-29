<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM appointments ORDER BY app_id DESC") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 					= $count++;
		$list['app_id'] 				= $row['app_id'];
		$list['user_id'] 				= $row['user_id'];
		$list['queue_number'] 			= $row['queue_number']==0?"":$row['queue_number'];
		$list['patient'] 				= patientFullName($row['patient_id']);
		$list['service'] 				= service_info("service",$row['service_id']);
		$list['description'] 			= $row['description'];
		$list['status_value'] 			= $row['status'];
		$list['status'] 				= getStatusDisplay($row['status'],$row['user_id']);
		$list['status_disabled'] 		= getStatusDisplayDisable($row['status']);
		$list['status_display_none'] 	= getStatusDisplayNone($row['status']);
		$list['time'] 					= date("F j, Y",strtotime($row['app_time']));
		$list['approved_by'] 			= userFullName($row['user_id']);
		$list['date_added'] 			= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>