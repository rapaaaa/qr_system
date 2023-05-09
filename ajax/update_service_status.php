<?php
	include '../core/config.php';

	if(isset($_POST['service_id'])){
		$service_id		= $_POST['service_id'];
		$status 		= service_info("status",$service_id);
		$status_ 		= $status=="E" || $status==""?"D":"E";
		$update_data 	= "status = '$status_'";

		$mysqli->query("UPDATE services SET $update_data WHERE service_id = '$service_id' ") or die(mysql_error());
		echo 1;
	}
?>