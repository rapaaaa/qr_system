<?php
	include '../core/config.php';

	$user_id 	= $_POST['user_id'];
	$fetch_user = $mysqli->query("SELECT * FROM users WHERE user_id = '$user_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
		$list['user_id'] = $row['user_id'];
		$list['first_name'] = $row['first_name'];
		$list['middle_name'] = $row['middle_name'];
		$list['last_name'] = $row['last_name'];
		$list['category'] = get_userTypeDD($row['category_id']);
		$list['username'] = $row['username'];
		$list['password'] = "";
		$list['date_added'] = $row['date_added'];

		array_push($response, $list);
	}

	echo json_encode($response);

function get_userTypeDD($user_type){
	$select1 = $user_type==1?"selected":"";
	$select2 = $user_type==2?"selected":"";

	$dropdown = "<option value='1' $select1> Doctor </option>
	    		 <option value='2' $select2> Health Worker </option>";
	return $dropdown;
}