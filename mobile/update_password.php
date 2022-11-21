<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->user_id) && $data->user_id > 0){
	$user_id = $mysqli_connect->real_escape_string($data->user_id);
	$oldPassword = $mysqli_connect->real_escape_string($data->old_password);
	$newPassword = $mysqli_connect->real_escape_string($data->new_password);
	$newPasswordConfirm = $mysqli_connect->real_escape_string($data->confirm_password);
	$date = getCurrentDate();

	$fetch_user = $mysqli_connect->query("SELECT password from patients where patient_id='$user_id' ") or die(mysqli_error());
	$user_row = $fetch_user->fetch_array();

	if(md5($oldPassword) != $user_row[0]){
		echo 2; // old pw dont match
	}else if($newPassword != $newPasswordConfirm){
		echo 3; // pw dont match
	}else{
		$sql = $mysqli_connect->query("UPDATE `patients` SET password=md5('$newPassword') WHERE patient_id='$user_id'") or die(mysqli_error());

		if($sql){
			echo 1;
		}else{
			echo 0;
		}
	}

}

?>