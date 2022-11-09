<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $cus_id) {
		$mysqli->query("DELETE FROM check_up_supplies WHERE cus_id = '$cus_id'");
	}

	echo 1;
?>