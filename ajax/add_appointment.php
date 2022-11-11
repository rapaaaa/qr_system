<?php
	include '../core/config.php';

	if(isset($_POST['patient_id'])){
		$user_id = $_SESSION['user_id'];
		$patient_id = $_POST['patient_id'];
		$service_id = $_POST['service_id'];
		$queue_number = $_POST['queue_number'];
		$description = $mysqli->real_escape_string($_POST['description']);
		$date_added = date("Y-m-d H:i:s");
		$time 		= date("H:i:s",strtotime($_POST['time']));

		$sql = $mysqli->query("INSERT INTO appointments SET user_id = '$user_id', patient_id = '$patient_id', service_id = '$service_id', queue_number = '$queue_number', description = '$description',app_time='$time', date_added = '$date_added'") OR die(mysql_error());
		echo 1;
	}
?>