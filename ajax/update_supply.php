<?php
	include '../core/config.php';

	if(isset($_POST['update_supply_id'])){
		$supply_id			= $_POST['update_supply_id'];
		$name				= $_POST['update_name'];
		$price				= $_POST['update_price'];
		$description		= $_POST['update_description'];	
		$quantity			= $_POST['update_quantity'];	
		$remarks			= $_POST['update_remarks'];
		$supply_category	= $_POST['update_supply_category'];
		$update_data 		= "name = '$name',price='$price', description = '$description', quantity = '$quantity', remarks = '$remarks', supply_category = '$supply_category'";

		$mysqli->query("UPDATE supplies SET $update_data WHERE supply_id = '$supply_id' ") or die(mysql_error());
		echo 1;
	}
?>