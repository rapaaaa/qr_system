<?php
	include '../../core/config.php';
	$cu_id = $_POST['cu_id'];
	$fetch = $mysqli->query("SELECT * FROM check_up_supplies WHERE cu_id='$cu_id' ORDER BY cus_id DESC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$subtotal = $row['quantity']*$row['price'];

 		$list['count'] 			= $count++;
		$list['cus_id'] 		= $row['cus_id'];
		$list['supply'] 		= supply_info("name",$row['supply_id']);
		$list['quantity'] 		= number_format($row['quantity']*1,2);
		$list['price'] 			= number_format($row['price']*1,2);
		$list['subtotal'] 		= number_format($subtotal*1,2);
		$list['date_added'] 	= date("F j, Y H:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>