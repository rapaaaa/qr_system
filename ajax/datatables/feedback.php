<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM feedbacks ORDER BY date_added DESC") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 			= $count++;
		$list['id'] 			= $row['id'];
		$list['user'] 			= patientFullName($row['user_id']);
		$list['feedback'] 		= $row['feedback'];
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>