<?php
	include '../core/config.php';

	if(isset($_POST['update_app_id'])){
		$app_id			= $_POST['update_app_id'];
		$queue_number	= $_POST['update_queue_number'];
		$patient_id		= $_POST['update_patient_id'];
		$service_id		= $_POST['update_service_id'];
		$description	= $_POST['update_description'];	
		$app_time		= date("Y-m-d",strtotime($_POST['update_app_time']));



		$fetch = $mysqli->query("SELECT * FROM doctor_schedule WHERE date='$app_time'") or die(mysqli_error());
		$row = $fetch->fetch_array();
		$max_residents = $row['max_residents'];

		$fetch_count_appointments = $mysqli->query("SELECT * FROM appointments WHERE  date_format(`app_time`,'%Y-%m-%d')='$app_time'") or die(mysqli_error());
		$count_appointment = mysqli_num_rows($fetch_count_appointments);


		if($max_residents==0){
			echo 2;
		}else if($max_residents<$count_appointment){
			echo 3;
		}else{
			$update_data 	= "patient_id = '$patient_id',service_id = '$service_id', description = '$description',queue_number='$queue_number',app_time='$app_time'";

			$mysqli->query("UPDATE appointments SET $update_data WHERE app_id = '$app_id' ") or die(mysql_error());
			echo 1;
		}
	}
?>