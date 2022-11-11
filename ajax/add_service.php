<?php
	include '../core/config.php';

	if(isset($_POST['service'])){
		$service 		= $mysqli->real_escape_string($_POST['service']);
		$service_fee 	= $mysqli->real_escape_string($_POST['service_fee']);
		$date_added 	= date("Y-m-d H:i:s");


		$sql = $mysqli->query("INSERT INTO services SET service = '$service', service_fee = '$service_fee', date_added = '$date_added'") OR die(mysql_error());
		
		echo 1;
	}
?>