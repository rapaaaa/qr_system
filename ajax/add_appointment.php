<?php
	include '../core/config.php';

	if(isset($_POST['patient_id'])){
		$user_id = $_SESSION['user_id'];
		$patient_id = $_POST['patient_id'];
		$service_id = $_POST['service_id'];
		$queue_number = $_POST['queue_number'];
		$description = $mysqli->real_escape_string($_POST['description']);
		$date_added = $system_date;
		$time 		= date("Y-m-d",strtotime($_POST['time']));

		$fetch = $mysqli->query("SELECT * FROM doctor_schedule WHERE date='$time'") or die(mysqli_error());
		$row = $fetch->fetch_array();
		$max_residents = $row['max_residents'];

		$fetch_count_appointments = $mysqli->query("SELECT * FROM appointments WHERE  date_format(`app_time`,'%Y-%m-%d')='$time'") or die(mysqli_error());
		$count_appointment = mysqli_num_rows($fetch_count_appointments);

		if($max_residents==0){
			echo 2;
		}else if($max_residents<$count_appointment){
			echo 3;
		}else{
			$sql = $mysqli->query("INSERT INTO appointments SET user_id = '$user_id', patient_id = '$patient_id', service_id = '$service_id', queue_number = '$queue_number', description = '$description',app_time='$time', date_added = '$date_added'") OR die(mysql_error());
			echo 1;
		}

		
	}
?>