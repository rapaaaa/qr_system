<?php
	include '../core/config.php';

	$service_id = $_POST['service_id'];
	$fetch_user = $mysqli->query("SELECT * FROM services WHERE service_id = '$service_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
		$list['service_id'] = $row['service_id'];
		$list['service'] = $row['service'];
		$list['service_fee'] = $row['service_fee'];

		array_push($response, $list);
	}

	echo json_encode($response);
