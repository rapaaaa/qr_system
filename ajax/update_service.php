<?php
	include '../core/config.php';

	if(isset($_POST['update_service_id'])){
		$service_id		= $_POST['update_service_id'];
		$service		= $_POST['update_service'];
		$service_fee	= $_POST['update_service_fee'];	
		$update_data 	= "service = '$service', service_fee = '$service_fee'";

		$mysqli->query("UPDATE services SET $update_data WHERE service_id = '$service_id' ") or die(mysql_error());
		echo 1;
	}
?>