<?php
	include '../core/config.php';

	if(isset($_POST['first_name'])){
		$user_id = $_SESSION['user_id'];
		$first_name = $mysqli->real_escape_string($_POST['first_name']);
		$middle_name = $mysqli->real_escape_string($_POST['middle_name']);
		$last_name = $mysqli->real_escape_string($_POST['last_name']);
		$username = $mysqli->real_escape_string($_POST['username']);
		$gender = $_POST['gender'];
		$contact_number = $mysqli->real_escape_string($_POST['contact_number']);
		$birthday = $_POST['birthday'];
		$address = $mysqli->real_escape_string($_POST['address']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$date_added = $system_date;


		$sql = $mysqli->query("INSERT INTO patients SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name',gender = '$gender',contact_number = '$contact_number',birthday = '$birthday',address = '$address', username = '$username', password = md5('$password'), encoded_by = '$user_id', date_added = '$date_added'") OR die(mysql_error());

		echo 1;
	}
	
?>