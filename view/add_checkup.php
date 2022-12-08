<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Checkup</h1>
    </div>

    <!-- Content Row -->
    <div class="row" id="parameter_div">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="input-group col-sm-8">
                        <div class="input-group-prepend"><span class="input-group-text"><strong>QR Code:</strong></span></div>
                        <input type="text" name="qr_number" class="form-control" id="qr_number" autocomplete="off" onchange="scan_qr_code()" autofocus>
                        <button type="button" class="btn bg-transparent" style="margin-left: -40px; z-index: 100;" onclick="clear_qr_input()"><i class="fa fa-times"></i></button>

                        <div class="input-group-prepend"><span class="input-group-text"><strong>Queue Number:</strong></span></div>
                        <select class="form-control input-sm" name='app_id' id='app_id' required onchange="get_appointments()">
                            <option value=''>Please choose queue #:</option>
                            <?php //Note: if user_id==0 pending appointment
                                $date = date('Y-m-d');
                                $fetch = $mysqli->query("SELECT * FROM appointments WHERE user_id!='0' AND status='0' AND date_format(app_time, '%Y-%m-%d')='$date' ORDER BY queue_number") or die(mysqli_error());
                                while ($row = $fetch->fetch_array()) {
                            ?>
                            <option value='<?=$row['app_id']?>'><?=$row['queue_number'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="add_appointments"></div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function clear_qr_input(){
        $("#qr_number").val("").focus();
    }

    function save_referral(){
        var cu_id = $("#cu_id").val();
        var referred_to = $("#referred_to").val();
        var referral_remarks = $("#referral_remarks").val();
      
        $.post("ajax/save_referral.php",{
            cu_id:cu_id,
            referred_to:referred_to,
            referral_remarks:referral_remarks
        },function(data){
            success_update();
            get_ReferralData();
        });
    }

    function scan_qr_code(){
        var qr_number = $("#qr_number").val();
        $.post("ajax/scan_qr_code.php",{
            qr_number:qr_number
        },function(data){
            if(data==0){
                modified_alert("Oops!","Invalid QR Code.","warning");
            }else{
                modified_alert("Success!","This patient has an appointment.","success");
            }
            $("#qr_number").focus().select();
            document.getElementById("app_id").value = data;
            get_appointments();
        });
    }

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
            success_finish();
            $("#app_id").html(data); 
            $("#qr_number").val("").focus();
            get_appointments();
        });
    }

    function save_checkup(){
        var prescription = $("#cu_prescription").val();
        var remarks = $("#cu_remarks").val();
        var service_id = $("#cu_service_id").val();
        var cu_app_id = $("#cu_app_id").val();
        $.post("ajax/save_checkup.php",{
            prescription:prescription,
            remarks:remarks,
            service_id:service_id,
            cu_app_id:cu_app_id
        },function(data){
            get_appointments();
            success_add();
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
            get_ReferralData();
        });
    }

    function delete_ref(){
         var checkedValues = $('.delete_check_box_ref:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

        if(confirmation == true){
            $.post("ajax/delete_referral.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_ReferralData();
                }else{
                    warning_info();
                }   
            });
        }
    }

    function delete_cus(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

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

    function get_ReferralData() {
        var cu_patient_id = $("#cu_patient_id").val();
        $("#ref_table").DataTable().destroy();
        $("#ref_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/referrals.php",
                "dataSrc":"data", 
                "data":{
                    cu_patient_id:cu_patient_id
                },
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box_ref' name='check_ref' value='"+row.r_id+"'>";                
                }
            },
            {
                "data":"referred_to"
            },
            {
                "data":"referral_remarks"
            },
            {
                "data":"date_added"
            }
            ]
        });
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