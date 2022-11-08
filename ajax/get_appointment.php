<?php
include '../core/config.php';

$app_id 	= $_POST['app_id'];
$fetch_user = $mysqli->query("SELECT * FROM appointments WHERE app_id = '$app_id'") or die(mysqli_error());

$response = array();
while ($row = $fetch_user->fetch_array()) {
	$list = array();
	$list['app_id'] = $row['app_id'];
	$list['patient_id'] = $row['patient_id'];
	$list['queue_number'] = $row['queue_number'];
	$list['app_time'] = $row['app_time'];
	$list['description'] = $row['description'];

	array_push($response, $list);
}

echo json_encode($response);