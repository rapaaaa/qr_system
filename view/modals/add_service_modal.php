<form role="form" method='POST' id="form_add_service">
	<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-plus-circle"></i>
	                    <span class="text">Add service</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">
					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Service:</strong></span></div>
					  	<input type="text" class="form-control" name="service" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Service Fee:</strong></span></div>
					  	<input type="number" class="form-control" name="service_fee" step=".01" autocomplete="off" required>
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