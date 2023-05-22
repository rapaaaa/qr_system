<?php
	include '../core/config.php';
	$cu_id 			= $_POST['cu_id'];
	$supply_id 		= $_POST['supply_id'];
	$quantity 		= $_POST['supply_quantity'];
	$batch_id 		= $_POST['batch_id'];
	$date_added 	= $system_date;


	$price = supply_info("price",$supply_id);

	$remaining_quantity = getInventoryQuantitySub($supply_id,$batch_id);

	if($remaining_quantity < $quantity){
		echo 2;
	}else{
		$mysqli->query("INSERT INTO check_up_supplies SET cu_id = '$cu_id', supply_id = '$supply_id', quantity = '$quantity', price = '$price', date_added = '$date_added', batch_id = '$batch_id'") OR die(mysql_error());

		echo 1;
	}

	
?>