<?php 
function user_info($selected_data,$user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function supplyCategory($supply_category){
	$result = $supply_category=="M"?"Medicine":(($supply_category=="V")?"Vaccine":"");

	return $result;
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

function usernameChecker($username,$update_user_id){
	global $mysqli;
	if($update_user_id>0){
		//FOR UPDATE
		$fetch = $mysqli->query("SELECT * FROM users WHERE username='$username' AND user_id !='$update_user_id'") or die(mysqli_error());
	}else{
		//FOR ADD
		$fetch = $mysqli->query("SELECT * FROM users WHERE username='$username'") or die(mysqli_error());
	}
	$result = mysqli_num_rows($fetch);

	return $result;
}

function getStatusDisplay($status){
	$result = $status==0?"<span style='color:orange'>Saved</span>":(($status==1)?"<span style='color:green'>Finished</span>":"");

	return $result;
}

function getStatusDisplayDisable($status){
	$result = $status==0?"":(($status==1)?"disabled":"");

	return $result;
}
?>