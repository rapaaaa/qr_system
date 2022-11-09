<?php
	include '../core/config.php';
	$app_id = $_POST['cu_app_id'];

	$mysqli->query("UPDATE check_ups SET status = '1' WHERE app_id = '$app_id' ") or die(mysql_error());
	$mysqli->query("UPDATE appointments SET status = '1' WHERE app_id = '$app_id' ") or die(mysql_error());

	echo 1;