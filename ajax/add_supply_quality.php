<?php
	include '../core/config.php';

	if(isset($_POST['supply_id'])){
		$supply_id 	= $mysqli->real_escape_string($_POST['supply_id']);
		$quantity 	= $mysqli->real_escape_string($_POST['quantity']);
	

		$sql = $mysqli->query("INSERT INTO supply_quantity SET supply_id = '$supply_id',quantity = '$quantity'") OR die(mysql_error());
	
		echo 1;
		
	}
	
?>