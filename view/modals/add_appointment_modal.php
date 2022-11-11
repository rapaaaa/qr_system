<form role="form" method='POST' id="form_add_appointment">
	<div class="modal fade" id="addAppModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-plus-circle"></i>
	                    <span class="text">Add Appointment</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Queue number:</strong></span></div>
					  	<input type="text" name="queue_number" class="form-control" id="queue_number" readonly>
					</div>

	            	<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Patient:</strong></span></div>
					  	<select class="form-control" name='patient_id' required>
	            			<option value=''>Please choose patient:</option>
	            			<?php
	            				$fetch_patient = $mysqli->query("SELECT * FROM patients ORDER BY first_name ASC") or die(mysqli_error());
								while ($patient_row = $fetch_patient->fetch_array()) {
									echo "<option value='$patient_row[patient_id]'>".patientFullName($patient_row['patient_id'])."</option>";
								}
	            			?>
	            		</select>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Service:</strong></span></div>
					  	<select class="form-control" name='service_id' required>
	            			<option value=''>Please choose service:</option>
	            			<?php
	            				$fetch_service = $mysqli->query("SELECT * FROM services ORDER BY service ASC") or die(mysqli_error());
								while ($service_row = $fetch_service->fetch_array()) {
									echo "<option value='$service_row[service_id]'>".$service_row['service']."</option>";
								}
	            			?>
	            		</select>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Description:</strong></span></div>
					  	<textarea class="form-control" name='description' required></textarea>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Time:</strong></span></div>
					  	<input type="time" class="form-control" name="time" required>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-primary btn-sm" id="btn_add"><i class="fas fa-check-circle"></i> Save</button>
	                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
	            </div>
	        </div>
	    </div>
	</div>
</form>