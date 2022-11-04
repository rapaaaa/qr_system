<?php
	include '../../core/config.php';

	$fetch_user = $mysqli->query("SELECT * FROM users ORDER BY last_name ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

 		$list['count'] 		= $count++;
		$list['user_id'] 	= $row['user_id'];
		$list['name'] 		= userFullName($row['user_id']);
		$list['category'] 	= userCategory($row['category_id']);
		$list['username'] 	= $row['username'];
		$list['date_added'] = date("F j, Y (H:i:s)",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>