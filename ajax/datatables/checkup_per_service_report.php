<?php
	include '../../core/config.php';
	$start_date = $_POST['start_date'];
	$end_date 	= $_POST['end_date'];

	$fetch = $mysqli->query("SELECT * FROM check_ups WHERE date_format(`date_added`,'%Y-%m-%d')>='$start_date' AND date_format(`date_added`,'%Y-%m-%d')<='$end_date'  AND status='1'") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list 		= array();
		$fetch_app 	= $mysqli->query("SELECT * FROM appointments WHERE app_id='$row[app_id]'") or die(mysqli_error());
		$app_row 	= $fetch_app->fetch_array();
		
 		$list['count'] 				= $count++;
		$list['patient'] 			= patientFullName($app_row['patient_id']);
		$list['service'] 			= service_info("service",$row['service_id']);
		$list['service_fee'] 		= number_format(service_info("service_fee",$row['service_id']),2);
		$list['date_added'] 		= date("F j, Y h:i A",strtotime($row['date_added']));
		array_push($response['data'], $list);
	}
	echo json_encode($response);
?>