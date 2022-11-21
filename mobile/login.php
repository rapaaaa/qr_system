<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->username) && !empty($data->username) ){
	
	$username = $mysqli_connect->real_escape_string($data->username);
	$password = $mysqli_connect->real_escape_string($data->password);

	$date = getCurrentDate();

	$fetch_rows = $mysqli_connect->query("SELECT patient_id from patients where username='$username' and password=md5('$password') ") or die(mysqli_error());
	$row = $fetch_rows->fetch_array();

	$response = array();

	if($row[0] > 0){

		$response['user_id'] = $row['patient_id'];
		$response['response'] = 1;

	}else{
		$response['user_id'] = 0;
		$response['user_category'] = 0;
		$response['response'] = -1;
	}

	echo json_encode($response);
	
}

?>