<?php 
function user_info($selected_data,$user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function userCategory($category_id){
	$result = $category_id==1?"Doctor":(($category_id==2)?"Health Worker":(($category_id==3)?"Patient":""));

	return $result;
}

function userFullName($user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row['last_name'].", ".$row['first_name']." ".$row['middle_name'];
}

function patientFullName($patient_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT * FROM patients WHERE patient_id='$patient_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row['last_name'].", ".$row['first_name']." ".$row['middle_name'];
}

function patientGender($gender){
	return $gender=="M"?"<span style='color:skyblue'>Male</span>":"<span style='color:pink'>Female</span>";
}

?>