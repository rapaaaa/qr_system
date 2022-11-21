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
	$username = $mysqli_connect->real_escape_string($data->username);
	$password = $mysqli_connect->real_escape_string($data->password);
	$date = getCurrentDate();

	$fetch_count = $mysqli_connect->query("SELECT count(patient_id) from patients where password=md5('$password') and patient_id='$user_id' ");
	$count_row = $fetch_count->fetch_array();

	if($count_row[0] == 0){
		echo -1;
	}else{
		$sql = $mysqli_connect->query("UPDATE `patients` SET `username`='$username' WHERE patient_id='$user_id'");
		if($sql){
			echo 1;
		}else{
			echo 0;
		}
	}

}

?>