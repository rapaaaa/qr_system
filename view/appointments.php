<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Appointments</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" onclick="addAppModal()">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add appointment</span>
                    </a>

                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected appointment</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='app_table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_app')"></th>
                                    <th style="width: 5px;"></th>
                                    <th>Queue Number</th>
                                    <th>Patient</th>
                                    <th>Service</th>
                                    <th>Time</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
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

    <?php 
        include 'modals/add_appointment_modal.php';
        include 'modals/update_appointment_modal.php';
    ?>

<script type="text/javascript">
    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to continue?");

        if(confirmation == true){
            $.post("ajax/delete_appointment.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_AppData();
                }else{
                    warning_info();
                }   
            });
        }
    }

    $("#form_appointment_update").submit(function(e){
        e.preventDefault();
        $("#btn_update_save").prop('disabled',true);
        $.ajax({
            type:"POST",
            url:"ajax/update_appointment.php",
            data:$("#form_appointment_update").serialize(),
            success:function(data){
                if(data == 1){
                    $("#UpdateAppointmentModal").modal('hide');
                    success_update();
                    get_AppData();
                }else{
                    warning_info();
                    $("#UpdateAppointmentModal").modal('hide');
                }
            }

        });
        $("#btn_update_save").prop('disabled',false);
    });

    function showUpdateModal(app_id){
        $("#UpdateAppointmentModal").modal('show');
        $.post("ajax/get_appointment.php",
            {
                app_id:app_id
            },function(data){
                var get_data = JSON.parse(data);
                $("#update_app_id").val(get_data[0].app_id);
                document.getElementById("update_patient_id").value = get_data[0].patient_id;
                document.getElementById("update_service_id").value = get_data[0].service_id;
                $("#update_description").val(get_data[0].description);  
                $("#update_queue_number").val(get_data[0].queue_number); 
                $("#update_app_time").val(get_data[0].app_time); 
        });
    }

    $("#form_add_appointment").submit(function(e){
        e.preventDefault();
        $("#btn_add").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"ajax/add_appointment.php",
            data:$("#form_add_appointment").serialize(),
            success:function(data){
                if(data == 1){
                    $("#addAppModal").modal('hide');
                    success_add();
                    get_AppData();

                    $("#form_add_appointment").each(function(){
                       this.reset();
                    });
                }else{
                    warning_info();
                    $("#addAppModal").modal('hide');
                }

            }
        });
        $("#btn_add").prop('disabled', false);
    });

    function addAppModal(){
        $("#addAppModal").modal('show');
        $.post("ajax/appointment_queue_number.php"
        ,function(data){
            $("#queue_number").val(data);
        });
    }

    function get_AppData() {
        $("#app_table").DataTable().destroy();
        $("#app_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/appointments.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_app' value='"+row.app_id+"'>"; 
                }
            },
            {
                "mRender":function(data, type, row){
                    return "<button type='button'class='btn btn-info btn-sm btn-fill' style='padding:5px;' data-toggle='tooltip' title='Update Record' onclick='showUpdateModal("+row.app_id+")'><span class='fa fa-edit'></span></button>";
                }
            },
             {
                "data":"queue_number"
            },
            {
                "data":"patient"
            },
            {
                "data":"service"
            },
            {
                "data":"time"
            },
            {
                "data":"description"
            },
            {
                "data":"status"
            },
            {
                "data":"date_added"
            }
            ]
        });
    }

$(document).ready(function() {
    get_AppData();
});
</script>

</div>