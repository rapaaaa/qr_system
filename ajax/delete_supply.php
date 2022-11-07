<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $supply_id) {
		$mysqli->query("DELETE FROM supplies WHERE supply_id = '$supply_id' ");
	}

	echo 1;
?>