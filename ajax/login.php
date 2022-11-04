<?php 
	include '../core/config.php';

	if(isset($_POST['username'])){
		$username 		= $mysqli -> real_escape_string($_POST['username']);
		$password_ 		= $mysqli -> real_escape_string($_POST['password']);
		$password 		= md5($password_);

		$fetch 	= $mysqli->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
		$row 	= $fetch->fetch_array();
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['category_id'] = $row['category_id'];
		
		echo (count($row)>0)?1:0;

	}
?>