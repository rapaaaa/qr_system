<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $patient_id) {
		$mysqli->query("DELETE FROM patients WHERE patient_id = '$patient_id' ");
	}

	echo 1;
?>