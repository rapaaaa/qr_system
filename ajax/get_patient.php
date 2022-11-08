<?php
	include '../core/config.php';

	$patient_id = $_POST['patient_id'];
	$fetch_user = $mysqli->query("SELECT * FROM patients WHERE patient_id = '$patient_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
		$list['patient_id'] = $row['patient_id'];
		$list['first_name'] = $row['first_name'];
		$list['middle_name'] = $row['middle_name'];
		$list['last_name'] = $row['last_name'];
		$list['gender'] = get_patientGenderDD($row['gender']);
		$list['contact_number'] = $row['contact_number'];
		$list['birthday'] = $row['birthday'];
		$list['address'] = $row['address'];
		$list['username'] = $row['username'];
		$list['password'] = "";
		$list['date_added'] = $row['date_added'];

		array_push($response, $list);
	}

	echo json_encode($response);

function get_patientGenderDD($gender){
	$select1 = $gender=="M"?"selected":"";
	$select2 = $gender=="F"?"selected":"";

	$dropdown = "<option value='M' $select1> Male </option>
	    		 <option value='F' $select2> Female </option>";
	return $dropdown;
}