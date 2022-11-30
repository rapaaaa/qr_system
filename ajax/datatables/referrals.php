<?php
	include '../../core/config.php';
	$patient_id = $_POST['cu_patient_id'];
	$fetch = $mysqli->query("SELECT * FROM appointments AS a, check_ups AS c, referrals AS r WHERE c.app_id=a.app_id AND c.cu_id=r.cu_id AND a.patient_id='$patient_id'") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

 		$list['count'] 				= $count++;
		$list['r_id'] 				= $row['r_id'];
		$list['referred_to'] 		= $row['referred_to'];
		$list['referral_remarks'] 	= $row['referral_remarks'];
		$list['date_added'] 		= date("F j, Y H:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>