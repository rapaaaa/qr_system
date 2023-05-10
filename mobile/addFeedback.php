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
    $feedback = $mysqli_connect->real_escape_string($data->userFeedback);

    $date = getCurrentDate();

    $sql= $mysqli_connect->query("INSERT INTO `feedbacks`(`user_id`, `feedback`, `date_added`) VALUES ('$user_id','$feedback','$date')");
                
    if($sql){
        echo 1;
    }else{
        echo 0;
    }
}