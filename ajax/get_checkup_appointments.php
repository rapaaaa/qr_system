<?php
	include '../core/config.php';
	$date = date('Y-m-d');
?>
<div class="input-group" style="margin-bottom: 5px;">
  	<div class="input-group-prepend"><span class="input-group-text"><strong>Queue Number:</strong></span></div>
  	<select class="form-control input-sm" name='app_number' required>
		<option value=''>Please choose queue number:</option>
		<?php 
			$fetch = $mysqli->query("SELECT * FROM appointments WHERE status='0' AND date_format(date_added, '%Y-%m-%d')='$date' ORDER BY queue_number") or die(mysqli_error());
			while ($row = $fetch->fetch_array()) {
		?>
		<option value='<?=$row['app_id']?>'><?=$row['queue_number'] ?></option>
		<?php } ?>
	</select>
</div>