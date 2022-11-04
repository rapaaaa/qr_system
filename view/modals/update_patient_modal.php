<form role="form" method='POST' id="form_user_update">
	<div class="modal fade" id="UpdatePatientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-edit"></i>
	                    <span class="text">Update patient</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<input type="hidden" name="update_patient_id" id="update_patient_id">

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="First Name" name="update_first_name" id="update_first_name" autocomplete="off" required>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Middle Name" name="update_middle_name" id="update_middle_name" autocomplete="off">
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Last Name" name="update_last_name" id="update_last_name" autocomplete="off" required>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<select class="form-control update_gender" name='update_gender' id='update_gender'>
	            			<option value=''>Please choose gender:</option>
	            			<option value='M'>Male</option>
	            			<option value='F'>Female</option>
	            		</select>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Contact Number" name="update_contact_number" id="update_contact_number" autocomplete="off" required>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input placeholder="Birthday" class="textbox-n form-control" type="text" onclick="(this.type='date')" name="update_birthday" id="update_birthday">
	            	</div>
	            
	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Username" name="update_username" id="update_username" autocomplete="off" required>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Password" name="update_password" id="update_password" autocomplete="off">
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