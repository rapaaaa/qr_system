<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));

$service_id = $mysqli_connect->real_escape_string($data->service_id);
$app_time = $mysqli_connect->real_escape_string($data->app_time);
$description = $mysqli_connect->real_escape_string($data->description);
$patient_id = $mysqli_connect->real_escape_string($data->user_id);


$date = getCurrentDate();

$sql= $mysqli_connect->query("INSERT INTO `appointments`(`service_id`, `app_time`, `description`,`patient_id`) VALUES ('$service_id', '$app_time', '$description','$patient_id')");
			
if($sql){
    echo 1;
}else{
    echo 0;
}

