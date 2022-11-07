<?php
	include '../core/config.php';

	if(isset($_POST['name'])){
		$name 				= $_POST['name'];
		$description 		= $mysqli->real_escape_string($_POST['description']);
		$remarks 			= $mysqli->real_escape_string($_POST['remarks']);
		$supply_category 	= $_POST['supply_category'];
		$date_added 		= date("Y-m-d H:i:s");

		$sql = $mysqli->query("INSERT INTO supplies SET name = '$name', description = '$description', remarks = '$remarks', supply_category = '$supply_category', date_added = '$date_added'") OR die(mysql_error());
		
		echo 1;
	}
	
?>