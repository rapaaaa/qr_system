<form role="form" method='POST' id="form_post_update">
	<div class="modal fade" id="UpdatePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-edit"></i>
	                    <span class="text">Update post</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">
	            	<input type="hidden" name="update_post_id" id="update_post_id">

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Title:</strong></span></div>
					  	<input type="text" class="form-control" name="update_title" id="update_title" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Content:</strong></span></div>
					  	<textarea class="form-control" name="update_content" id="update_content" autocomplete="off" required></textarea>
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