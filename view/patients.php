<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Residents</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle='modal' data-target='#addPatientModal'>
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add resident</span>
                    </a>

                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected resident</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='patient_table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_user')"></th>
                                    <th style="width: 5px;"></th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Username</th>
                                    <!-- <th>Encoded By</th> -->
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
       include 'modals/add_patient_modal.php';
       include 'modals/update_patient_modal.php';
    ?>

<script type="text/javascript">
    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

        if(confirmation == true){
            $.post("ajax/delete_patient.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_PatientData();
                }else{
                    warning_info();
                }   
            });
        }
    }

    $("#form_user_update").submit(function(e){
        e.preventDefault();
        var update_password = $("#update_password").val(); 
        if(update_password==""){
            $("#btn_update_save").prop('disabled',true);
            $.ajax({
                type:"POST",
                url:"ajax/update_patient.php",
                data:$("#form_user_update").serialize(),
                success:function(data){
                    if(data == 1){
                        $("#UpdatePatientModal").modal('hide');
                        success_update();
                        get_PatientData();
                    }else{
                        warning_info();
                        $("#UpdatePatientModal").modal('hide');
                    }
                }

            });
            $("#btn_update_save").prop('disabled',false);
        }else{
            var confirmthis = confirm("Are you sure you want to update password?");
            if(confirmthis==true){
                $("#btn_update_save").prop('disabled',true);
                $.ajax({
                    type:"POST",
                    url:"ajax/update_patient.php",
                    data:$("#form_user_update").serialize(),
                    success:function(data){
                        if(data == 1){
                            $("#UpdatePatientModal").modal('hide');
                            success_update();
                            get_PatientData();
                        }else{
                            warning_info();
                            $("#UpdatePatientModal").modal('hide');
                        }
                    }

                });
                $("#btn_update_save").prop('disabled',false);
            }

        }

    });

    function showUpdateModal(patient_id){
       $("#UpdatePatientModal").modal('show');
        $.post("ajax/get_patient.php",
            {
                patient_id:patient_id
            },function(data){
               var get_data = JSON.parse(data);

                $("#update_patient_id").val(get_data[0].patient_id);
                $("#update_first_name").val(get_data[0].first_name);
                $("#update_middle_name").val(get_data[0].middle_name);
                $("#update_last_name").val(get_data[0].last_name);
                $(".update_gender").val(get_data[0].gender);
                $("#update_contact_number").val(get_data[0].contact_number);
                $("#update_birthday").val(get_data[0].birthday);
                $("#update_address").val(get_data[0].address);
                $("#update_username").val(get_data[0].username);
                $("#update_password").val(get_data[0].password);
        });
    }

    $("#form_add_patient").submit(function(e){
        e.preventDefault();
        $("#btn_add").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"ajax/add_patient.php",
            data:$("#form_add_patient").serialize(),
            success:function(data){
                if(data == 1){
                    $("#addPatientModal").modal('hide');
                    success_add();
                    get_PatientData();

                    $("#form_add_patient").each(function(){
                       this.reset();
                    });
                }else{
                    warning_info();
                    $("#addPatientModal").modal('hide');
                }

            }
        });
        $("#btn_add").prop('disabled', false);
    });

    function get_PatientData() {
        $("#patient_table").DataTable().destroy();
        $("#patient_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/patients.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.patient_id+"'>";                
                }
            },
            {
                "mRender":function(data, type, row){
                    return "<button class='btn btn-info btn-sm btn-fill' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='showUpdateModal("+row.patient_id+")'><span class='fa fa-edit'></span></button>";
                }
            },
            {
                "data":"name"
            },
            {
                "data":"gender"
            },
            {
                "data":"contact_number"
            },
            {
                "data":"birthday"
            },
            {
                "data":"address"
            },
            {
                "data":"username"
            },
            // {
            //     "data":"encoded_by"
            // },
            {
                "data":"date_added"
            },
            ]
        });
    }

$(document).ready(function() {
   get_PatientData();
});
</script>

</div>