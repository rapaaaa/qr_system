<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));
$fetch = $mysqli_connect->query("SELECT * FROM services");
$response = array();
while ($row = $fetch->fetch_array()) {
    $list = array();
    $list['id'] = $row['service_id'];
    $list['service'] = $row['service'];
    array_push($response, $list);
}

echo json_encode($response);
?>