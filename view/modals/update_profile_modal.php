<form role="form" method='POST' id="form_profile_update">
	<div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-edit"></i>
	                    <span class="text">Update profile</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<input type="hidden" name="update_user_id" id="update_user_id">

	            	<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>First Name:</strong></span></div>
					  	<input type="text" class="form-control" name="update_first_name" id="update_first_name" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Middle Name:</strong></span></div>
					  	<input type="text" class="form-control" name="update_middle_name" id="update_middle_name" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Last Name:</strong></span></div>
					  	<input type="text" class="form-control" name="update_last_name" id="update_last_name" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Contact Number:</strong></span></div>
					  	<input type="text" class="form-control" name="update_contact_number" id="update_contact_number" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Address:</strong></span></div>
					  	<textarea class="form-control" name="update_address" id="update_address" autocomplete="off" required></textarea>
					</div>
	            
	            	<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Username:</strong></span></div>
					  	<input type="text" class="form-control" name="update_username" id="update_username" autocomplete="off" required>
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