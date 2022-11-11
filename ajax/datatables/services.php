<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM services ORDER BY service ASC") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 			= $count++;
		$list['service_id'] 	= $row['service_id'];
		$list['service'] 		= $row['service'];
		$list['service_fee'] 	= number_format($row['service_fee'],2);
		$list['date_added'] 	= date("F j, Y H:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>