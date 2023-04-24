<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));
$user_id = $mysqli_connect->real_escape_string($data->user_id);
$fetch = $mysqli_connect->query("SELECT * FROM appointments WHERE patient_id='$user_id' AND status='1' ORDER BY app_time DESC");

$response = array();
while ($row = $fetch->fetch_array()) {

    $fetch_check_up = $mysqli_connect->query("SELECT * FROM check_ups WHERE app_id='$row[app_id]'");
    $cRow = $fetch_check_up->fetch_array();

    $list = array();
    $list['id'] = $row['app_id'];
    $list['user'] = getUser($row['user_id']);
    $list['patient'] = getPatient($row['patient_id']);
    $list['service'] = getService($row['service_id']);
    $list['prescription'] = $cRow['prescription'];
    $list['remarks'] = $cRow['remarks'];
    $list['description'] = $row['description'];
    $list['queue_number'] = $row['queue_number'];
    $list['app_time'] = $row['app_time'];
    $list['date_added'] = date('M d, Y h:i A', strtotime($row['date_added']));
    array_push($response, $list);
}

echo json_encode($response);
?>