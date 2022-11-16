<?php
	include '../core/config.php';
	$app_id = $_POST['cu_app_id'];

	$mysqli->query("UPDATE check_ups SET status = '1' WHERE app_id = '$app_id' ") or die(mysql_error());
	$mysqli->query("UPDATE appointments SET status = '1' WHERE app_id = '$app_id' ") or die(mysql_error());

	echo refresh_queue_number();

	function refresh_queue_number(){
		global $mysqli;
			echo "<option value=''>Please choose queue #:</option>";
            $date 	= date('Y-m-d');
            $fetch 	= $mysqli->query("SELECT * FROM appointments WHERE status='0' AND date_format(date_added, '%Y-%m-%d')='$date' ORDER BY queue_number") or die(mysqli_error());
            while ($row = $fetch->fetch_array()) {
       
        	echo "<option value='".$row['app_id']."'>".$row['queue_number']."</option>";
        } 
	}