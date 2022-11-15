<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM posts ORDER BY date_added DESC") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 			= $count++;
		$list['post_id'] 		= $row['post_id'];
		$list['author'] 		= userFullName($row['user_id']);
		$list['title'] 			= $row['title'];
		$list['content'] 		= $row['content'];
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>