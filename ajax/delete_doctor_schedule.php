<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $ds_id) {
		$mysqli->query("DELETE FROM doctor_schedule WHERE ds_id = '$ds_id'");
	}

	echo 1;
?>