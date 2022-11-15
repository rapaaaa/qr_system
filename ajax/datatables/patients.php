<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM patients ORDER BY date_added ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 				= $count++;
		$list['patient_id'] 		= $row['patient_id'];
		$list['name'] 				= patientFullName($row['patient_id']);
		$list['gender'] 			= patientGender($row['gender']);
		$list['contact_number'] 	= $row['contact_number'];
		$list['birthday'] 			= date("F j, Y",strtotime($row['birthday']));
		$list['address'] 			= $row['address'];
		$list['username'] 			= $row['username'];
		$list['encoded_by'] 		= userFullName($row['encoded_by']);
		$list['date_added'] 		= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>