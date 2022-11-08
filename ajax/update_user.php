<?php
	include '../core/config.php';

	if(isset($_POST['update_user_id'])){
		$user_id		= $_POST['update_user_id'];
		$first_name		= $_POST['update_first_name'];
		$middle_name	= $_POST['update_middle_name'];	
		$last_name		= $_POST['update_last_name'];
		$username		= $_POST['update_username'];
		$password		= $_POST['update_password'];
		$category_id	= $_POST['update_category'];


		if(usernameChecker($username,$user_id)==0){
			if($password==""){
				$update_data = "category_id = '$category_id', first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', username = '$username'";
			}else{
				$update_data = "category_id = '$category_id', first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', username = '$username', password = md5('$password')";
			}

			$mysqli->query("UPDATE users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
			echo 1;
		}else{
			echo 2;
		}
	}
?>