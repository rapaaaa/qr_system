<form role="form" method='POST' id="form_add_user">
	<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-plus-circle"></i>
	                    <span class="text">Add user</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Category:</strong></span></div>
					  	<select class="form-control" name='category_id' required>
	            			<option value=''>Please choose category:</option>
	            			<option value='1'>Doctor</option>
	            			<option value='2'>Health Worker</option>
	            		</select>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>First Name:</strong></span></div>
					  	<input type="text" class="form-control" name="first_name" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Middle Name:</strong></span></div>
					  	<input type="text" class="form-control" name="middle_name" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Last Name:</strong></span></div>
					  	<input type="text" class="form-control" name="last_name" autocomplete="off" required>
					</div>
					
					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Username:</strong></span></div>
					  	<input type="text" class="form-control" name="username" autocomplete="off" required>
					</div>
	            
					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Password:</strong></span></div>
					  	<input type="text" class="form-control" name="password" autocomplete="off">
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