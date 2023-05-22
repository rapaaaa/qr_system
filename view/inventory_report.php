<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Inventory report</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="main_dt" class="table table-bordered table-striped" style="font-size:12px;width:100%;">
                          <thead>
                            <!--MAIN HEADER -->
                            <tr style="text-align:center;background: #383838;color: #fff;">
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Date Added</th>
                              <th>Expiration Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $fetch_supplies = $mysqli->query("SELECT * FROM supplies ORDER BY name ASC") or die(mysqli_error());
                              while ($supply_row = $fetch_supplies->fetch_array()) { //LOOP 1 START
                                  $fetch_supplies_batch = $mysqli->query("SELECT * FROM supply_quantity WHERE supply_id='$supply_row[supply_id]' ORDER BY batch_number ASC") or die(mysqli_error());
                                  $remaining_quantity   = getInventoryQuantity($supply_row['supply_id']);

                                  $count_supplies_batch = mysqli_num_rows($fetch_supplies_batch);
                                  $cursor               = ($count_supplies_batch > 0)?"cursor: pointer;":"";
                                  $cont                 = ($count_supplies_batch > 0)?"<span id='span_button$supply_row[supply_id]' class='fa fa-caret-right main_caret' style='float: right'></span>":"";

                                  $remaining_quantity_ = $remaining_quantity<5?"<span style='color:red'>$remaining_quantity</span>":$remaining_quantity;

                                  echo "<tr style='font-size: 13px;text-align: center;background:#949494;color:#000;$cursor' onclick='toggle_sub(".$supply_row['supply_id'].")'>
                                      <td>$supply_row[name] &nbsp $cont</td>
                                      <td>$remaining_quantity_</td>
                                      <td></td>
                                      <td></td>";
                                    "</tr>";

                                   
                                  while ($supply_batch_row = $fetch_supplies_batch->fetch_array()) { //LOOP 2 START
                                    
                                    $sub_remaining_quantity   = getInventoryQuantitySub($supply_row['supply_id'],$supply_batch_row['id']);

                                    $sub_remaining_quantity_ = $sub_remaining_quantity<5?"<span style='color:red'>$sub_remaining_quantity</span>":$sub_remaining_quantity;

                                    if($sub_remaining_quantity>0){ //LOOP 3 START
                                      echo "<tr class='content_sub$supply_row[supply_id]' style='font-size: 13px;color:#000;display:none;'>
                                            <td style='text-align: end;'>BATCH $supply_batch_row[batch_number]</td>
                                            <td style='text-align: center;'>$sub_remaining_quantity_</td>
                                            <td style='text-align: center;'>".date("F j, Y",strtotime($supply_batch_row['date_added']))."</td>
                                            <td style='text-align: center;'>".date("F j, Y",strtotime($supply_batch_row['expiration_date']))."</td>";
                                          "</tr>";
                                    } //LOOP 3 END
                                  } //LOOP 2 END 
                              } //LOOP 1 END 
                            ?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">
function get_cps_report() {

  $('#main_dt').DataTable({
    "bSort": false,
    "ordering": false,
    "paging": false,
    "searching": false,
    paging: false,
    fixedColumns: true,
    info: false,
  });
}

function toggle_sub(id) {
  if($("#span_button"+id).hasClass('fa-caret-right')){
    $("#span_button"+id).removeClass('fa-caret-right');
    $("#span_button"+id).addClass('fa-caret-down');
  }else{
    $("#span_button"+id).removeClass('fa-caret-down');
    $("#span_button"+id).addClass('fa-caret-right');
  }
    $(".content_sub"+id).fadeToggle("fast");
}

$(document).ready(function() {
	get_cps_report();
});
</script>

</div>