<?php
	include '../core/config.php';

	if(isset($_POST['update_ds_id'])){
		$ds_id			= $_POST['update_ds_id'];
		$date			= $_POST['update_date'];
		$start_time		= $_POST['update_start_time'];
		$end_time		= $_POST['update_end_time'];	
		$description	= $_POST['update_description'];
		$max_residents	= $_POST['update_max_residents'];

		$update_data 		= "date = '$date',start_time='$start_time', end_time = '$end_time', description = '$description', max_residents='$max_residents'";

		$mysqli->query("UPDATE doctor_schedule SET $update_data WHERE ds_id = '$ds_id' ") or die(mysql_error());
		echo 1;
	}
?>