<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM check_ups ORDER BY date_added DESC") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$fetch_app = $mysqli->query("SELECT * FROM appointments WHERE app_id='$row[app_id]'") or die(mysqli_error());
		$app_row = $fetch_app->fetch_array();

		
 		$list['count'] 				= $count++;
		$list['cu_id'] 				= $row['cu_id'];
		$list['patient'] 			= patientFullName($app_row['patient_id']);
		$list['service'] 			= service_info("service",$row['service_id']);
		$list['user_id'] 			= $row['user_id'];
		$list['remarks'] 			= $row['remarks'];
		$list['prescription'] 		= $row['prescription'];
		$list['status'] 			= getStatusDisplay($row['status'],$row['user_id']);
		$list['date_added'] 		= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>