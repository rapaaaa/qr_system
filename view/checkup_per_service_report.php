<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Checkup per service report</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                   <div class="input-group col-sm-7">
                      <div class="input-group-prepend"><span class="input-group-text"><strong>Start Date:</strong></span></div>
                      <input type="date" class="form-control" id="start_date" autocomplete="off" value="<?=date('Y-m-d')?>">
                      <div class="input-group-prepend"><span class="input-group-text"><strong>End Date:</strong></span></div>
                      <input type="date" class="form-control" id="end_date" autocomplete="off" value="<?=date('Y-m-d')?>">
                      <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="get_cps_report()"><span class="fa fa-sync"></span> Generate</button>
                     </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table id='cps_table' class="table table-bordered" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Patient</th>
                                  <th>Service</th>
                                  <!-- <th>Service Fee</th> -->
                                  <th>Date Added</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <!-- <tfoot>
                            <tr>
                              <th colspan="3" style="text-align:right">Total:</th>
                              <th></th>
                              <th></th>
                            </tr>
                          </tfoot> -->
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">
function get_cps_report() {
  var start_date = $("#start_date").val();
  var end_date = $("#end_date").val();

  $("#cps_table").DataTable().destroy();
  $("#cps_table").DataTable({
      "responsive": true,
      "processing": true,
      "ajax":{
          "type":"POST",
          "url":"ajax/datatables/checkup_per_service_report.php",
          "dataSrc":"data", 
          "data":{
              start_date:start_date,
              end_date:end_date
          },
      },
      footerCallback: function (row, data, start, end, display) {
          var api = this.api();
          // Remove the formatting to get integer data for summation
          var intVal = function (i) {
              return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
          };
          // Total over all pages
          total = api.column(3).data().reduce(function (a, b) {return intVal(a) + intVal(b);}, 0);
          // Total over this page
          pageTotal = api.column(3, { page: 'current' }).data().reduce(function (a, b) {return intVal(a) + intVal(b);}, 0);
          // Update footer
          $(api.column(3).footer()).html(total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
      },
      "columns":[
      {
          "data":"count"
      },
      {
          "data":"patient"
      },
      {
          "data":"service"
      },
      // {
      //     "data":"service_fee"
      // },
      {
          "data":"date_added"
      }
      ]
  });
}
$(document).ready(function() {
	get_cps_report();
});
</script>

</div>