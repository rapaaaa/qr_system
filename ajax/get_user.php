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
		$list['contact_number'] = $row['contact_number'];
		$list['address'] = $row['address'];
		$list['username'] = $row['username'];
		$list['date_added'] = $row['date_added'];
		

		//modified
		$list['password'] = "";
		$list['category'] = $row['category_id'];
		$list['category_display'] = userCategory($row['category_id']);


		array_push($response, $list);
	}

	echo json_encode($response);