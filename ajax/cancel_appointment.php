<?php
	include '../core/config.php';
		$app_id	= $_POST['app_id'];

		$mysqli->query("UPDATE appointments SET status = '2' WHERE app_id = '$app_id' ") or die(mysql_error());
		echo 1;

?>