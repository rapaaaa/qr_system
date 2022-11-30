<?php
	include '../core/config.php';
	$cu_id 				= $_POST['cu_id'];
	$referred_to 		= $_POST['referred_to'];
	$referral_remarks 	= $_POST['referral_remarks'];
	$date_added 		= $system_date;

	$fetch_referral = $mysqli->query("SELECT * FROM referrals WHERE cu_id='$cu_id'") or die(mysqli_error());
	$count_referral = mysqli_num_rows($fetch_referral);

	if($count_referral==0){
		$mysqli->query("INSERT INTO referrals SET cu_id = '$cu_id', referred_to = '$referred_to', referral_remarks = '$referral_remarks', date_added = '$date_added'") OR die(mysql_error());
	}else{
		$update_data = "referred_to = '$referred_to',referral_remarks = '$referral_remarks'";

		$mysqli->query("UPDATE referrals SET $update_data WHERE cu_id = '$cu_id' ") or die(mysql_error());
	}
	

	echo 1;
?>