<?php
	include '../core/config.php';
	$cu_id 			= $_POST['cu_id'];
	$supply_id 		= $_POST['supply_id'];
	$quantity 		= $_POST['supply_quantity'];
	$date_added 	= $system_date;


	$price = supply_info("price",$supply_id);

	$remaining_quantity = getInventoryQuantity($supply_id);

	if($remaining_quantity < $quantity){
		echo 2;
	}else{
		$mysqli->query("INSERT INTO check_up_supplies SET cu_id = '$cu_id', supply_id = '$supply_id', quantity = '$quantity', price = '$price', date_added = '$date_added'") OR die(mysql_error());

		echo 1;
	}

	
?>