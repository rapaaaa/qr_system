<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

//if(isset($data->username)){
	$first_name = $mysqli_connect->real_escape_string($data->first_name);
	$middle_name = $mysqli_connect->real_escape_string($data->middle_name);
	$last_name = $mysqli_connect->real_escape_string($data->last_name);
	$gender = $mysqli_connect->real_escape_string($data->gender);
	$birthday = $mysqli_connect->real_escape_string($data->birthday);
	$contact_number = $mysqli_connect->real_escape_string($data->contact_number);
    $address = $mysqli_connect->real_escape_string($data->address);
	
	$username = $mysqli_connect->real_escape_string($data->username);
	$password = $mysqli_connect->real_escape_string($data->password);

	$date = getCurrentDate();

	$fetch_rows = $mysqli_connect->query("SELECT count(patient_id) from patients where username='$username'") or die(mysqli_error());
	$count_rows = $fetch_rows->fetch_array();

	if($count_rows[0] > 0){
// 		$response['user_id'] = 0;
// 		$response['response'] = -1;
        echo -1;
	}else{
		$sql= $mysqli_connect->query("INSERT INTO `patients` (`first_name`, `middle_name`, `last_name`, `gender`, `contact_number`, `birthday`, `address`, `username`, `password`,`date_added`) VALUES ('$first_name','$middle_name','$last_name','$gender','$contact_number','$birthday','$address','$username',md5('$password'),'$date')");
			
		if($sql){
			$user_id = $mysqli_connect->insert_id;
			echo $user_id;
// 			$response['user_id'] = $user_id;
// 			$response['response'] = 1;
		}else{
// 			$response['user_id'] = 0;
// 			$response['response'] = 0;
            echo 0;
		}
		
	}
	
//}

?>