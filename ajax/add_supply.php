<?php
	include '../core/config.php';

	if(isset($_POST['name'])){
		$name 				= $mysqli->real_escape_string($_POST['name']);
		$description 		= $mysqli->real_escape_string($_POST['description']);
		$quantity 			= $mysqli->real_escape_string($_POST['quantity']);
		$remarks 			= $mysqli->real_escape_string($_POST['remarks']);
		$supply_category 	= $_POST['supply_category'];
		$date_added 		= $system_date;

		$sql = $mysqli->query("INSERT INTO supplies SET name = '$name',description = '$description',quantity = '$quantity', remarks = '$remarks', supply_category = '$supply_category', date_added = '$date_added'") OR die(mysql_error());
		
		echo 1;
	}
	
?>