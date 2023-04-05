<?php
	include '../core/config.php';
	
	$fetch = $mysqli->query("SELECT * FROM appointments WHERE status!='2' ORDER BY app_id DESC") or die(mysqli_error());
	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {

	$notif_note 		= $row['user_id']==0?"Pending Appointment":"Approved Appointment";
	$notif_header_color = $row['notif_status']==0?"color:#00c88e;":"color:#848895;";
?>

	<span class="dropdown-item d-flex align-items-center" data-toggle="tooltip" title="Mark as read" onclick="notif_mark_as_read(<?=$row['app_id']?>)" style="cursor: pointer;">
	    <div class="mr-3">
	       	<?php 
	       		echo $row['notif_status']==0?"<div class='icon-circle bg-success'><i class='fas fa-envelope text-white'></i></div>":"<div class='icon-circle bg-gray-600'><i class='fas fa-envelope-open text-white'></i></div>";
	       	?>
	    </div>
	    <div>
	    	<span class="font-weight-bold" style="<?=$notif_header_color?>"><?= $notif_note?></span><br>
	        <span class="font-weight-bold"><?= patientFullName($row['patient_id'])?></span><br>
	        <span class="font-weight-bold"><?= service_info("service",$row['service_id'])?></span><br>
	        <span class="font-weight-bold"><?= date("F j, Y h:i A",strtotime($row['app_time']))?></span>
	    </div>
	</span>
<?php } ?>