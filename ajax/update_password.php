<?php
	include '../core/config.php';
	if(isset($_POST['update_password_user_id'])){
		$user_id 				= $_POST['update_password_user_id'];
		$current_password		= md5($_POST['current_password']);
		$new_password			= md5($_POST['new_password']);
		$confirm_new_password	= md5($_POST['confirm_new_password']);
		$current_password_ 		= user_info("password",$user_id);
		
		if($current_password!=$current_password_){
			echo 2; //check if current password is correct
		}else if($new_password!=$confirm_new_password){
			echo 3; //check if new password and confirm password is correct
		}else{
			$update_data = "password = '$confirm_new_password'";

			$mysqli->query("UPDATE users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
			echo 1;
		}
	}
?>