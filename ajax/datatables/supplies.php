<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM supplies ORDER BY name ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 			= $count++;
		$list['supply_id'] 		= $row['supply_id'];
		$list['name'] 			= $row['name'];
		$list['category'] 		= supplyCategory($row['supply_category']);
		$list['price'] 			= number_format($row['price'],2);
		$list['description'] 	= $row['description'];
		$list['remarks'] 		= $row['remarks'];
		$list['date_added'] 	= date("F j, Y H:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>