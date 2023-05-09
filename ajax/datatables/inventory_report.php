<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM supplies ORDER BY name ASC") or die(mysqli_error());
	$response['data'] = array();

	while ($row = $fetch->fetch_array()) {
		$list 		= array();

		$remaining_quantity = getInventoryQuantity($row['supply_id']);
 		
		$list['supply'] 	= $row['name'];
		$list['quantity'] 	= $remaining_quantity<5?"<span style='color:red'>$remaining_quantity</span>":$remaining_quantity;

		array_push($response['data'], $list);
	}
	echo json_encode($response);
?>