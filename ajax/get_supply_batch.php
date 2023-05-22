<?php
include '../core/config.php';

$supply_id = $_POST['supply_id'];

$fetch 	= $mysqli->query("SELECT * FROM supply_quantity WHERE supply_id = '$supply_id'") or die(mysqli_error());
while ($row = $fetch->fetch_array()) {
	echo "<option value='$row[id]'>$row[batch_number]</option>";
}