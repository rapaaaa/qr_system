<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->user_id) && !empty($data->user_id )){

	$user_id = $mysqli_connect->real_escape_string($data->user_id);

	$response = array();
	$fetch = $mysqli_connect->query("SELECT * FROM patients where patient_id='$user_id' ");
	$response = $fetch->fetch_array();

	echo json_encode($response);

}

?>