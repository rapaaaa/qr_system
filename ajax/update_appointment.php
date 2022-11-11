<?php
	include '../core/config.php';

	if(isset($_POST['update_app_id'])){
		$app_id			= $_POST['update_app_id'];
		$queue_number	= $_POST['update_queue_number'];
		$patient_id		= $_POST['update_patient_id'];
		$service_id		= $_POST['update_service_id'];
		$description	= $_POST['update_description'];	
		$app_time		= $_POST['update_app_time'];	

		$update_data 	= "patient_id = '$patient_id',service_id = '$service_id', description = '$description',queue_number='$queue_number',app_time='$app_time'";

		$mysqli->query("UPDATE appointments SET $update_data WHERE app_id = '$app_id' ") or die(mysql_error());
		echo 1;
	}
?>