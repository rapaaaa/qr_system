<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $id) {
		$mysqli->query("DELETE FROM feedbacks WHERE id = '$id'");
	}

	echo 1;
?>