<form role="form" method='POST' id="form_appointment_update">
	<div class="modal fade" id="UpdateAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-edit"></i>
	                    <span class="text">Update appointment</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>

	            <div class="modal-body">
	            	<input type="hidden" name="update_app_id" id="update_app_id">
	            	<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Queue number:</strong></span></div>
					  	<input type="text" name="update_queue_number" class="form-control" id="update_queue_number" readonly>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Patient:</strong></span></div>
					  	<select class="form-control" name='update_patient_id' id='update_patient_id' required>
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
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Description:</strong></span></div>
					  	<textarea class="form-control" name="update_description" id="update_description" autocomplete="off" required></textarea>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Time:</strong></span></div>
					  	<input type="time" class="form-control" name="update_app_time" id="update_app_time" required>
					</div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-primary btn-sm" id="btn_update_save"><i class="fas fa-check-circle"></i> Save</button>
	                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
	            </div>
	        </div>
	    </div>
	</div>
</form>