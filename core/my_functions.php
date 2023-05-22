<?php 
function user_info($selected_data,$user_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM users WHERE user_id='$user_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function supply_info($selected_data,$supply_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM supplies WHERE supply_id='$supply_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function service_info($selected_data,$service_id){
	global $mysqli;
	$fetch = $mysqli->query("SELECT $selected_data FROM services WHERE service_id='$service_id'") or die(mysqli_error());
	$row = $fetch->fetch_array();

	return $row[0];
}

function supplyCategory($supply_category){
	$result = $supply_category=="M"?"Medicine":(($supply_category=="V")?"Vaccine":"");

	return $result;
}

function userCategory($category_id){
	$result = $category_id==1?"Admin":(($category_id==2)?"Doctor":(($category_id==3)?"Health Worker":""));

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

function getStatusDisplay($status,$user_id){


	$result = $status==0 && $user_id!=0?"<span style='color:orange'>Saved</span>":(($status==1 && $user_id!=0)?"<span style='color:green'>Finished</span>":(($status==2)?"<span style='color:red'>Denied</span>":(($user_id==0)?"<span style='color:#4e73df;'>Pending</span>":"")));

	return $result;
}

function getStatusDisplayDisable($status){
	$result = $status==0?"":(($status==1)?"disabled":"");

	return $result;
}

function getStatusDisplayNone($status){
	$result = $status==0?"":(($status==1)?"display:none;":(($status==2)?"display:none;":""));

	return $result;
}

function getInventoryQuantity($supply_id){
	global $mysqli;

	$fetch_supply_quantity = $mysqli->query("SELECT SUM(quantity) FROM supply_quantity WHERE supply_id='$supply_id'") or die(mysqli_error());
	$supply_quantity_row 	= $fetch_supply_quantity->fetch_array();

	$fetch_check_up_supplies = $mysqli->query("SELECT SUM(quantity) FROM check_up_supplies WHERE supply_id='$supply_id'") or die(mysqli_error());
	$check_up_supplies_row 	= $fetch_check_up_supplies->fetch_array();
	$result = $supply_quantity_row[0] - $check_up_supplies_row[0];

	return $result;
}

function getInventoryQuantitySub($supply_id,$id){
	global $mysqli;

	$fetch_supply_quantity = $mysqli->query("SELECT SUM(quantity) FROM supply_quantity WHERE supply_id='$supply_id' AND id='$id'") or die(mysqli_error());
	$supply_quantity_row 	= $fetch_supply_quantity->fetch_array();

	$fetch_check_up_supplies = $mysqli->query("SELECT SUM(quantity) FROM check_up_supplies WHERE supply_id='$supply_id'  AND batch_id='$id'") or die(mysqli_error());
	$check_up_supplies_row 	= $fetch_check_up_supplies->fetch_array();
	$result = $supply_quantity_row[0] - $check_up_supplies_row[0];

	return $result;
}

function inventoryLowChecker(){
	global $mysqli;

	$fetch = $mysqli->query("SELECT * FROM supplies ORDER BY name ASC") or die(mysqli_error());
	$response['data'] = array();
	$result = 0;
	while ($row = $fetch->fetch_array()) {
		$fetch_supply_quantity = $mysqli->query("SELECT SUM(quantity) FROM supply_quantity WHERE supply_id='$row[supply_id]'") or die(mysqli_error());
		$supply_quantity_row 	= $fetch_supply_quantity->fetch_array();

		$fetch_check_up_supplies = $mysqli->query("SELECT SUM(quantity) FROM check_up_supplies WHERE supply_id='$row[supply_id]'") or die(mysqli_error());
		$check_up_supplies_row 	= $fetch_check_up_supplies->fetch_array();
		$remaining_quantity = $supply_quantity_row[0] - $check_up_supplies_row[0];


		if($remaining_quantity<5){
			$result +=1;
		}else{
			$result +=0;
		}
	}

	return $result;
}
?>