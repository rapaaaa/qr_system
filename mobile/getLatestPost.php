<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));
$fetch = $mysqli_connect->query("SELECT * FROM posts ORDER BY post_date DESC");
$response = array();
while ($row = $fetch->fetch_array()) {
    $list = array();
    $list['id'] = $row['post_id'];
    $list['user'] = getUser($row['user_id']);
    $list['post_title'] = $row['title'];
    $list['post_content'] = $row['content'];
    $list['post_date'] = date('M d, Y h:i A', strtotime($row['date_added']));
    array_push($response, $list);
}

echo json_encode($response);
?>