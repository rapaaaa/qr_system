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
                      <table id='table' class="table table-bordered" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>Product</th>
                                  <th>Quantity</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">
function get_cps_report() {

  $("#table").DataTable().destroy();
  $("#table").DataTable({
      "responsive": true,
      "processing": true,
      "ajax":{
          "type":"POST",
          "url":"ajax/datatables/inventory_report.php",
          "dataSrc":"data",
      },
      "columns":[
      {
          "data":"supply"
      },
      {
          "data":"quantity"
      },
      ]
  });
}
$(document).ready(function() {
	get_cps_report();
});
</script>

</div>