<?php
	include '../core/config.php';

	if(isset($_POST['first_name'])){
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $mysqli->real_escape_string($_POST['password']);
		$category_id = $_POST['category_id'];
		$date_added = date("Y-m-d H:i:s");


		$sql = $mysqli->query("INSERT INTO users SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', username = '$username', password = md5('$password'), category_id = '$category_id', date_added = '$date_added'") OR die(mysql_error());
		
		echo 1;
	}
	
?>