<?php
	include '../core/config.php';

	$result = $mysqli->query("SELECT * FROM appointments WHERE notif_status = '0' AND status!='2'") or die(mysqli_error());
	$counter = mysqli_num_rows($result);

	if($counter>0){
		echo "<span class='badge badge-danger badge-counter'>$counter</span>";
	}
?>


