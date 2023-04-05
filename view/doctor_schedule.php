<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Doctor Schedule</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle='modal' data-target='#addDSModal'>
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add schedule</span>
                    </a>

                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected schedule</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='ds_table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_ds')"></th>
                                    <th style="width: 5px;"></th>
                                    <th>Doctor</th>
                                    <th>Description</th>
                                    <th>Max Residents</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
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
        include 'modals/add_doctor_schedule_modal.php';
        include 'modals/update_doctor_schedule_modal.php';
    ?>

<script type="text/javascript">
    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

        if(confirmation == true){
            $.post("ajax/delete_doctor_schedule.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_DsData();
                }else{
                    warning_info();
                }   
            });
        }
    }

    $("#form_doctor_schedule_update").submit(function(e){
        e.preventDefault();
        $("#btn_update_save").prop('disabled',true);
        $.ajax({
            type:"POST",
            url:"ajax/update_doctor_schedule.php",
            data:$("#form_doctor_schedule_update").serialize(),
            success:function(data){
                if(data == 1){
                    $("#UpdateDsModal").modal('hide');
                    success_update();
                    get_DsData();
                }else{
                    warning_info();
                    $("#UpdateDsModal").modal('hide');
                }
            }

        });
        $("#btn_update_save").prop('disabled',false);
    });

    function showUpdateModal(ds_id){
        $("#UpdateDsModal").modal('show');
        $.post("ajax/get_doctor_schedule.php",
            {
                ds_id:ds_id
            },function(data){
               var get_data = JSON.parse(data);
                $("#update_ds_id").val(get_data[0].ds_id);
                $("#update_description").val(get_data[0].description);
                $(".update_max_residents").val(get_data[0].max_residents);
                $(".update_date").val(get_data[0].date);
                $(".update_start_time").val(get_data[0].start_time);
                $(".update_end_time").val(get_data[0].end_time);
        });
    }

    $("#form_add_doctor_schedule").submit(function(e){
        e.preventDefault();
        $("#btn_add").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"ajax/add_doctor_schedule.php",
            data:$("#form_add_doctor_schedule").serialize(),
            success:function(data){
                if(data == 1){
                    $("#addDSModal").modal('hide');
                    success_add();
                    get_DsData();

                    $("#form_add_doctor_schedule").each(function(){
                       this.reset();
                    });
                }else{
                    warning_info();
                    $("#addDSModal").modal('hide');
                }

            }
        });
        $("#btn_add").prop('disabled', false);
    });

    function get_DsData() {
        $("#ds_table").DataTable().destroy();
        $("#ds_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/doctor_schedule.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_ds' value='"+row.ds_id+"'>";                
                }
            },
            {
                "mRender":function(data, type, row){
                    return "<button class='btn btn-info btn-sm btn-fill' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='showUpdateModal("+row.ds_id+")'><span class='fa fa-edit'></span></button>";
                }
            },
            {
                "data":"name"
            },
            {
                "data":"description"
            },
            {
                "data":"max_residents"
            },
            {
                "data":"date"
            },
            {
                "data":"start_time"
            },
            {
                "data":"end_time"
            }
            ]
        });
    }

$(document).ready(function() {
    get_DsData();
});
</script>

</div>