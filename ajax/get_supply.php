<?php
	include '../core/config.php';

	$supply_id 	= $_POST['supply_id'];
	$fetch_user = $mysqli->query("SELECT * FROM supplies WHERE supply_id = '$supply_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
		$list['supply_id'] = $row['supply_id'];
		$list['name'] = $row['name'];
		$list['price'] = $row['price'];
		$list['description'] = $row['description'];
		$list['remarks'] = $row['remarks'];
		$list['supply_category'] = get_supplyCategoryDD($row['supply_category']);

		array_push($response, $list);
	}

	echo json_encode($response);

function get_supplyCategoryDD($type_){
	$select1 = $type_=="M"?"selected":"";
	$select2 = $type_=="V"?"selected":"";

	$dropdown = "<option value='M' $select1> Medicine </option>
	    		 <option value='V' $select2> Vaccine </option>";
	return $dropdown;
}