<?php
	include '../core/config.php';

		$app_id	= $_POST['app_id'];
		$user_id = $_SESSION['user_id'];
		$fetch = $mysqli->query("SELECT * FROM appointments WHERE app_id='$app_id'") or die(mysqli_error());
		$row = $fetch->fetch_array();
		$app_time = date("Y-m-d",strtotime($row['app_time']));

		$date = date('Y-m-d',strtotime($row['app_time']));
		$fetch_appointments = $mysqli->query("SELECT MAX(queue_number) FROM appointments WHERE date_format(app_time, '%Y-%m-%d')='$date'") or die(mysqli_error());
		$app_row = $fetch_appointments->fetch_array();
		$queue_number = $app_row[0]+1;


		$fetch_ds = $mysqli->query("SELECT * FROM doctor_schedule WHERE date='$app_time'") or die(mysqli_error());
		$ds_row = $fetch_ds->fetch_array();
		$max_residents = $ds_row['max_residents'];

		$fetch_count_appointments = $mysqli->query("SELECT * FROM appointments WHERE  date_format(`app_time`,'%Y-%m-%d')='$app_time' AND user_id!='0'") or die(mysqli_error());
		$count_appointment = mysqli_num_rows($fetch_count_appointments);

		if($max_residents==0){
			echo 2;
		}else if($max_residents<=$count_appointment){
			echo 3;
		}else{
			$update_data 	= "user_id = '$user_id',queue_number='$queue_number'";
			$mysqli->query("UPDATE appointments SET $update_data WHERE app_id = '$app_id' ") or die(mysql_error());
			echo 1;
		}
?>