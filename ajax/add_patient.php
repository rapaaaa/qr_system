<?php
	include '../core/config.php';

	if(isset($_POST['first_name'])){
		$user_id = $_SESSION['user_id'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$gender = $_POST['gender'];
		$contact_number = $_POST['contact_number'];
		$birthday = $_POST['birthday'];
		$password = $mysqli->real_escape_string($_POST['password']);
		$date_added = date("Y-m-d H:i:s");


		$sql = $mysqli->query("INSERT INTO patients SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name',gender = '$gender',contact_number = '$contact_number',birthday = '$birthday', username = '$username', password = md5('$password'), encoded_by = '$user_id', date_added = '$date_added'") OR die(mysql_error());

		echo 1;
	}
	
?>