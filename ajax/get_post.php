<?php
	include '../core/config.php';

	$post_id 	= $_POST['post_id'];
	$fetch_user = $mysqli->query("SELECT * FROM posts WHERE post_id = '$post_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
		$list['post_id'] = $row['post_id'];
		$list['title'] = $row['title'];
		$list['content'] = $row['content'];

		array_push($response, $list);
	}

	echo json_encode($response);
