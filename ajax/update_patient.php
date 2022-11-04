<?php
	include '../core/config.php';

	if(isset($_POST['update_patient_id'])){
		$patient_id		= $_POST['update_patient_id'];
		$first_name		= $_POST['update_first_name'];
		$middle_name	= $_POST['update_middle_name'];	
		$last_name		= $_POST['update_last_name'];
		$gender			= $_POST['update_gender'];
		$contact_number	= $_POST['update_contact_number'];
		$birthday		= $_POST['update_birthday'];
		$username		= $_POST['update_username'];
		$password		= $_POST['update_password'];


		if($password==""){
			$update_data = "first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', gender = '$gender', contact_number = '$contact_number', birthday = '$birthday', username = '$username'";
		}else{
			$update_data = "first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', gender = '$gender', contact_number = '$contact_number', birthday = '$birthday', username = '$username', password = md5('$password')";
		}

		$mysqli->query("UPDATE patients SET $update_data WHERE patient_id = '$patient_id' ") or die(mysql_error());
		echo 1;
	}
?>