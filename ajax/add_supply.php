<?php
	include '../core/config.php';

	if(isset($_POST['name'])){
		$name 				= $mysqli->real_escape_string($_POST['name']);
		$price 				= $mysqli->real_escape_string($_POST['price']);
		$description 		= $mysqli->real_escape_string($_POST['description']);
		$remarks 			= $mysqli->real_escape_string($_POST['remarks']);
		$supply_category 	= $_POST['supply_category'];
		$date_added 		= date("Y-m-d H:i:s");

		$sql = $mysqli->query("INSERT INTO supplies SET name = '$name',price='$price', description = '$description', remarks = '$remarks', supply_category = '$supply_category', date_added = '$date_added'") OR die(mysql_error());
		
		echo 1;
	}
	
?>