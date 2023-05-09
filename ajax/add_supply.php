<?php
	include '../core/config.php';

	if(isset($_POST['name'])){
		$name 				= $mysqli->real_escape_string($_POST['name']);
		$description 		= $mysqli->real_escape_string($_POST['description']);
		$remarks 			= $mysqli->real_escape_string($_POST['remarks']);
		$supply_category 	= $_POST['supply_category'];
		$date_added 		= $system_date;


		$result = $mysqli->query("SELECT * FROM supplies WHERE name = '$name'") or die(mysqli_error());
		$counter = mysqli_num_rows($result);

		if($counter>0){
			echo 2;
		}else{
			$sql = $mysqli->query("INSERT INTO supplies SET name = '$name',description = '$description', remarks = '$remarks', supply_category = '$supply_category', date_added = '$date_added'") OR die(mysql_error());
		
			echo 1;
		}
	}
	
?>