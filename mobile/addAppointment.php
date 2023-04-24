<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));

if(isset($data->user_id) && $data->user_id > 0){

    $service_id = $mysqli_connect->real_escape_string($data->service_id);
    $app_time = date("Y-m-d", strtotime($mysqli_connect->real_escape_string($data->app_time)));
    $description = $mysqli_connect->real_escape_string($data->description);
    $patient_id = $mysqli_connect->real_escape_string($data->user_id);

    $fetch = $mysqli->query("SELECT * FROM doctor_schedule WHERE date='$app_time'") or die(mysqli_error());
    $row = $fetch->fetch_array();
    $max_residents = $row['max_residents'];
    
    if($max_residents > 0){
        $sql= $mysqli_connect->query("INSERT INTO `appointments`(`service_id`, `app_time`, `description`,`patient_id`, date_added) VALUES ('$service_id', '$app_time', '$description','$patient_id', '$app_time')");
                
        if($sql){
            echo 1;
        }else{
            echo 0;
        }
    }else{
        echo 2;
    }
}