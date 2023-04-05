<?php
	include '../core/config.php';
	$app_id	= $_POST['app_id']==0?"":"WHERE app_id = '".$_POST['app_id']."'";
	$update_data = "notif_status = '1'";

	$mysqli->query("UPDATE appointments SET $update_data  $app_id") or die(mysql_error());
	echo 1;
?>