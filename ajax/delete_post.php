<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $post_id) {
		$mysqli->query("DELETE FROM posts WHERE post_id = '$post_id'");
	}

	echo 1;
?>