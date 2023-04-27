<form role="form" method='POST' id="form_supply_update">
	<div class="modal fade" id="UpdateSupplyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-edit"></i>
	                    <span class="text">Update medicine/vaccine</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<input type="hidden" name="update_supply_id" id="update_supply_id">

	            	<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Category:</strong></span></div>
					  	<select class="form-control update_supply_category" name='update_supply_category' id='update_supply_category' required>
	            			<option value=''>Please choose category:</option>
	            			<option value='M'>Medicine</option>
	            			<option value='V'>Vaccine</option>
	            		</select>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Name:</strong></span></div>
					  	<input type="text" class="form-control" name="update_name" id="update_name" autocomplete="off" required>
					</div>

					<!-- <div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Price:</strong></span></div> -->
					  	<input type="hidden" class="form-control" name="update_price" id="update_price" step=".01" autocomplete="off">
					<!-- </div> -->

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Quantity:</strong></span></div>
					  	<input type="number" class="form-control" name="update_quantity" id="update_quantity" step=".01" autocomplete="off">
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Description:</strong></span></div>
					  	<textarea class="form-control" name="update_description" id="update_description" autocomplete="off"></textarea>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Remarks:</strong></span></div>
					  	<textarea class="form-control" name="update_remarks" id="update_remarks" autocomplete="off"></textarea>
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