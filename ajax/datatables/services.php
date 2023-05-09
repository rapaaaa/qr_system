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
		$list['status'] 		= $row['status']==""|| $row['status']=='E'?"<button class='btn btn-success btn-sm btn-fill' data-toggle='tooltip' title='Click to disable' onclick='enableDisableServices($row[service_id])'><span class='fas fa-fw fa-check-circle'></span> Enabled</button>":"<button class='btn btn-danger btn-sm btn-fill' data-toggle='tooltip' title='Click to enable' onclick='enableDisableServices($row[service_id])'><span class='fas fa-fw fa-ban'></span> Disabled</button>";
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>