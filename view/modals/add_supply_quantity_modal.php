<style type="text/css">
    .select2{
        width: 82% !important;
    }
</style>

<form role="form" method='POST' id="form_add_supply_quantity">
	<div class="modal fade" id="addSupplyQuantityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">
	                    <i class="fas fa-plus-circle"></i>
	                    <span class="text">Add medicine/vaccine quantity</span></h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">

	            	<div class="input-group" style="margin-bottom: 5px;">
	            		<div class="input-group-prepend"><span class="input-group-text"><strong>Supply:</strong></span></div>
	                  	<select class="form-control select2" name='supply_id' required>
	                        <option value=''>Please choose supply:</option>
	                        <?php 
	                        	$fetch_supplies = $mysqli->query("SELECT * FROM supplies ORDER BY name ASC") or die(mysqli_error());
	                          	while ($supply_row = $fetch_supplies->fetch_array()) {
	                            	echo "<option value='$supply_row[supply_id]'>$supply_row[name]</option>";
	                          	}
	                        ?>
	                  	</select>
                  	</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Quantity:</strong></span></div>
					  	<input type="number" class="form-control" name="quantity" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Batch Number:</strong></span></div>
					  	<input type="number" class="form-control" name="batch_number" autocomplete="off" required>
					</div>

					<div class="input-group" style="margin-bottom: 5px;">
					  	<div class="input-group-prepend"><span class="input-group-text"><strong>Expiration Date:</strong></span></div>
					  	<input type="date" class="form-control" name="expiration_date" required>
					</div>

	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-primary btn-sm" id="btn_add_quantity"><i class="fas fa-check-circle"></i> Save</button>
	                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
	            </div>
	        </div>
	    </div>
	</div>
</form>