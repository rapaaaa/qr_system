<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Checkups</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 5px;">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><strong>Queue Number:</strong></span></div>
                    <select class="form-control input-sm" name='app_id' id='app_id' required onchange="get_appointments()">
                        <option value=''>Please choose queue #:</option>
                        <?php 
                            $date = date('Y-m-d');
                            $fetch = $mysqli->query("SELECT * FROM appointments WHERE status='0' AND date_format(date_added, '%Y-%m-%d')='$date' ORDER BY queue_number") or die(mysqli_error());
                            while ($row = $fetch->fetch_array()) {
                        ?>
                        <option value='<?=$row['app_id']?>'><?=$row['queue_number'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>
    <div class="row">
       <div class="col-lg-12" id="add_appointments"></div>
    </div>

<script type="text/javascript">
    function save_used_supply(){
        var cu_id = $("#cu_id").val();
        var supply_id = $("#supply_id").val();
        var supply_quantity = $("#supply_quantity").val();
          $.post("ajax/save_used_supply.php",{
            cu_id:cu_id,
            supply_id:supply_id,
            supply_quantity:supply_quantity
        },function(data){
            get_CUSData();
            success_add();
        });
    }

    function finish_checkup(){
        var cu_app_id = $("#cu_app_id").val();
        $.post("ajax/finish_checkup.php",{
            cu_app_id:cu_app_id
        },function(data){
            get_appointments();
            success_finish();
        });
    }

    function save_checkup(){
        var prescription = $("#cu_prescription").val();
        var remarks = $("#cu_remarks").val();
        var cu_app_id = $("#cu_app_id").val();
        $.post("ajax/save_checkup.php",{
            prescription:prescription,
            remarks:remarks,
            cu_app_id:cu_app_id
        },function(data){
            get_appointments();
            success_update();
        });
    }

    function get_appointments(){
        var app_id = $("#app_id").val();
        $.post("ajax/appointment_details_div.php",{
           app_id:app_id
        },
        function(data){
            $("#add_appointments").html(data);
            get_CUSData();
        });
    }

    function delete_cus(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to continue?");

        if(confirmation == true){
            $.post("ajax/delete_check_up_supplies.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_CUSData();
                }else{
                    warning_info();
                }   
            });
        }
    }

    function get_CUSData() {
        var cu_id = $("#cu_id").val();
        $("#cus_table").DataTable().destroy();
        $("#cus_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/check_up_supplies.php",
                "dataSrc":"data", 
                "data":{
                    cu_id:cu_id
                },
            },
            footerCallback: function (row, data, start, end, display) {
            var api = this.api();
 
            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
 
            // Total over all pages
            total = api
                .column(4)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Total over this page
            pageTotal = api
                .column(4, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
 
            // Update footer
            $(api.column(4).footer()).html(total.toFixed(2));
        },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_cus' value='"+row.cus_id+"'>";                
                }
            },
            {
                "data":"supply"
            },
            {
                "data":"quantity"
            },
            {
                "data":"price"
            },
            {
                "data":"subtotal"
            }
            ]
        });
    }

$(document).ready(function() {
    get_appointments();
});
</script>

</div>