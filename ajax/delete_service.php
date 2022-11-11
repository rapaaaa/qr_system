<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $service_id) {
		$mysqli->query("DELETE FROM services WHERE service_id = '$service_id'");
	}

	echo 1;
?>