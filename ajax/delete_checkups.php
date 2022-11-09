<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $cu_id) {
		$mysqli->query("DELETE FROM check_ups WHERE cu_id = '$cu_id'");
		$mysqli->query("DELETE FROM check_up_supplies WHERE cu_id = '$cu_id'");
	}

	echo 1;
?>