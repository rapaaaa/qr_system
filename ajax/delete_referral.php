<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $r_id) {
		$mysqli->query("DELETE FROM referrals WHERE r_id = '$r_id'");
	}

	echo 1;
?>