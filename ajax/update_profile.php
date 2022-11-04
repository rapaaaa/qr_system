<?php
	include '../core/config.php';

	if(isset($_POST['first_name'])){
		$user_id 		= $_SESSION['user_id'];
		$first_name		= $_POST['first_name'];
		$middle_name	= $_POST['middle_name'];	
		$last_name		= $_POST['last_name'];
		$username		= $_POST['username'];
		$password		= $_POST['password'];


		if($password==""){
			$update_data = "first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', username = '$username'";
		}else{
			$update_data = "first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', username = '$username', password = md5('$password')";
		}

		$mysqli->query("UPDATE users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
		echo 1;
	}
?>