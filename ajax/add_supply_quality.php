<?php
	include '../core/config.php';

	if(isset($_POST['supply_id'])){
		$supply_id 			= $mysqli->real_escape_string($_POST['supply_id']);
		$quantity 			= $mysqli->real_escape_string($_POST['quantity']);
		$batch_number 		= $mysqli->real_escape_string($_POST['batch_number']);
		$expiration_date 	= $mysqli->real_escape_string($_POST['expiration_date']);
	

		$sql = $mysqli->query("INSERT INTO supply_quantity SET supply_id = '$supply_id',quantity = '$quantity',batch_number = '$batch_number',expiration_date = '$expiration_date'") OR die(mysql_error());
	
		echo 1;
		
	}
	
?>