<?php
	include '../core/config.php';

	if(isset($_POST['update_supply_id'])){
		$supply_id			= $_POST['update_supply_id'];
		$name				= $_POST['update_name'];
		$description		= $_POST['update_description'];		
		$remarks			= $_POST['update_remarks'];
		$supply_category	= $_POST['update_supply_category'];
		$update_data 		= "name = '$name', description = '$description', remarks = '$remarks', supply_category = '$supply_category'";


		$result = $mysqli->query("SELECT * FROM supplies WHERE name = '$name' AND supply_id!='$supply_id'") or die(mysqli_error());
		$counter = mysqli_num_rows($result);

		if($counter>0){
			echo 2;
		}else{

			$mysqli->query("UPDATE supplies SET $update_data WHERE supply_id = '$supply_id' ") or die(mysql_error());
			echo 1;
		}
	}
?>