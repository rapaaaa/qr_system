<?php
	include '../core/config.php';

		$app_id	= $_POST['app_id'];
		$user_id = $_SESSION['user_id'];
		$fetch = $mysqli->query("SELECT * FROM appointments WHERE app_id='$app_id'") or die(mysqli_error());
		$row = $fetch->fetch_array();

		$date = date('Y-m-d',strtotime($row['app_time']));
		$fetch_appointments = $mysqli->query("SELECT MAX(queue_number) FROM appointments WHERE date_format(date_added, '%Y-%m-%d')='$date'") or die(mysqli_error());
		$count_data = mysqli_num_rows($fetch_appointments);
		if($count_data==0){
			$queue_number = 1;
		}else{
			$row = $fetch_appointments->fetch_array();
			$queue_number = $row[0]+1;
		}

		$update_data 	= "user_id = '$user_id',queue_number='$queue_number'";

		$mysqli->query("UPDATE appointments SET $update_data WHERE app_id = '$app_id' ") or die(mysql_error());
		echo 1;

?>