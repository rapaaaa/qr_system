<?php
	include '../core/config.php';

	if(isset($_POST['update_first_name'])){
		$user_id 		= $_POST['update_user_id'];
		$category_id	= $_POST['update_category'];
		$first_name		= $_POST['update_first_name'];
		$middle_name	= $_POST['update_middle_name'];	
		$last_name		= $_POST['update_last_name'];
		$contact_number	= $_POST['update_contact_number'];	
		$address		= $_POST['update_address'];
		$username		= $_POST['update_username'];

		if(usernameChecker($username,$user_id)==0){
			$update_data = "category_id = '$category_id',first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name',contact_number = '$contact_number',address = '$address', username = '$username'";

			$mysqli->query("UPDATE users SET $update_data WHERE user_id = '$user_id' ") or die(mysql_error());
			echo 1;
		}else{
			echo 2;
		}
	}
?>