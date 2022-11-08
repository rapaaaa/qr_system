<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $app_id) {
		$mysqli->query("DELETE FROM appointments WHERE app_id = '$app_id'");
	}

	echo 1;
?>