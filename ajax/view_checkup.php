<?php
	include '../core/config.php';
	$cu_id = $_POST['cu_id'];

	$fetch_checkups = $mysqli->query("SELECT * FROM check_ups WHERE cu_id='$cu_id'") or die(mysqli_error());
	$checkup_row = $fetch_checkups->fetch_array();

	$fetch_appointment = $mysqli->query("SELECT * FROM appointments WHERE app_id='$checkup_row[app_id]'") or die(mysqli_error());
	$app_row = $fetch_appointment->fetch_array();

	$fetch_patient = $mysqli->query("SELECT * FROM patients WHERE patient_id='$app_row[patient_id]'") or die(mysqli_error());
  	$patient_row = $fetch_patient->fetch_array();
?>

<div class="col-lg-12">
	<div class="row" style="padding: 5px;">
		<div class="col-sm-6">
        	<strong style="color: #4e73df;">Patient Profile:</strong>
          	<div class="card" style="width: 100%;">
	            <ul class="list-group list-group-flush" style="font-size: 13px;">
	            	<li class="list-group-item" style="padding: 8px;"><strong>Name:</strong> <?=patientFullName($patient_row['patient_id'])?></li>
	              	<li class="list-group-item" style="padding: 8px;"><strong>Gender:</strong> <?=patientGender($patient_row['gender'])?></li>
	              	<li class="list-group-item" style="padding: 8px;"><strong>Contact #:</strong> <?= $patient_row['contact_number'];?></li>
	              	<li class="list-group-item" style="padding: 8px;"><strong>Birdthday:</strong> <?= date("F j, Y",strtotime($patient_row['birthday']))?></li>
	             	<li class="list-group-item" style="padding: 8px;"><strong>Address:</strong> <?= $patient_row['address']?></li>
	            </ul>
          </div>
		</div>

		<div class="col-sm-6">
	    	<strong style="color: #4e73df;">Appointment Details:</strong>
	      	<div class="card" style="width: 100%;">
		        <ul class="list-group list-group-flush" style="font-size: 13px;">
		        	<li class="list-group-item" style="padding: 8px;"><strong>Date:</strong> <?= date('F j,Y h:i A',strtotime($app_row['date_added']));?></li>
		          	<li class="list-group-item" style="padding: 8px;"><strong>Time:</strong> <?= date('h:i A',strtotime($app_row['app_time']));?></li>
		          	<li class="list-group-item" style="padding: 8px;"><strong>Service:</strong> <?= service_info("service",$app_row['service_id']);?></li>
		          	<li class="list-group-item" style="padding: 8px;"><strong>Description:</strong> <?= $app_row['description'];?></li>
		          	<li class="list-group-item" style="padding: 8px;"><strong>Encoded by:</strong> <?= userFullName($app_row['user_id']);?></li>
		          	<li class="list-group-item" style="padding: 8px;"><strong>Status:</strong> <?= getStatusDisplay($app_row['status']);?></li>
		        </ul>
	      	</div>
		</div>
	</div>
</div>

<div class="col-lg-12">
	<div class="row" style="padding: 10px;">
		<div class="col-sm-12">
			<strong style="color: #4e73df;">Used Supply:</strong>
	        <div class="col-sm-12" style="margin-bottom: 2px;">
	          	<div class="table-responsive" style="font-size: 13px;">
                      <table id='cus_table' class="table table-bordered" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>Supply</th>
                                  <th>Category</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                  <th>Subtotal</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          	<?php 
                          		$total = 0;
                          		$fetch_cus = $mysqli->query("SELECT * FROM check_up_supplies WHERE cu_id='$cu_id' ORDER BY cus_id DESC") or die(mysqli_error());
								while ($cus_row = $fetch_cus->fetch_array()) {
								$subtotal = $cus_row['quantity']*$cus_row['price'];
								$total +=$subtotal;
                          	?>
                          	<tr>
                          		<td><?= supply_info("name",$cus_row['supply_id']);?></td>
                          		<td><?= supplyCategory(supply_info("supply_category",$cus_row['supply_id']));?></td>
                          		<td><?= number_format($cus_row['quantity']*1,2); ?></td>
                          		<td><?= number_format($cus_row['price']*1,2); ?></td>
                          		<td><?= number_format($subtotal*1,2) ?></td>
                          	</tr>
                          	<?php } ?>
                          <tfoot>
                              <tr>
                                  <th colspan="4" style="text-align:right">Total:</th>
                                  <th><?= number_format($total*1,2) ?></th>
                              </tr>
                          </tfoot>
                      </table>
                  </div>
	        </div>
		</div>
	</div>
</div>