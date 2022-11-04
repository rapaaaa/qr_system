<form role="form" method='POST' id="form_add_patient">
	<div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-plus-circle"></i>
	                    <span class="text">Add patient</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="First Name" name="first_name" autocomplete="off" required>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Middle Name" name="middle_name" autocomplete="off">
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Last Name" name="last_name" autocomplete="off" required>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<select class="form-control" name='gender'>
	            			<option value=''>Please choose gender:</option>
	            			<option value='M'>Male</option>
	            			<option value='F'>Female</option>
	            		</select>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Contact Number" name="contact_number" autocomplete="off" required>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input placeholder="Birthday" class="textbox-n form-control" type="text" onclick="(this.type='date')" id="date" name="birthday">
	            	</div>
	            
	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
	            	</div>

	            	<div class="col-sm-12" style="margin-bottom: 5px;">
	            		<input type="text" class="form-control" placeholder="Password" name="password" autocomplete="off">
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