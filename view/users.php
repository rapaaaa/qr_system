<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle='modal' data-target='#addUserModal'>
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add user</span>
                    </a>

                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected user</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='user_table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_user')"></th>
                                    <th style="width: 5px;"></th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Username</th>
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
        include 'modals/add_user_modal.php';
        include 'modals/update_user_modal.php';
    ?>

<script type="text/javascript">
    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

        if(confirmation == true){
            $.post("ajax/delete_user.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_UserData();
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
                url:"ajax/update_user.php",
                data:$("#form_user_update").serialize(),
                success:function(data){
                    if(data == 1){
                        $("#UpdateUserModal").modal('hide');
                        success_update();
                        get_UserData();
                    }else if(data == 2){
                        modified_alert("Oops!","Username already used. Please use different username.","warning");
                    }else{
                        warning_info();
                        $("#UpdateUserModal").modal('hide');
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
                    url:"ajax/update_user.php",
                    data:$("#form_user_update").serialize(),
                    success:function(data){
                        if(data == 1){
                            $("#UpdateUserModal").modal('hide');
                            success_update();
                            get_UserData();
                        }else if(data == 2){
                            modified_alert("Oops!","Username already used. Please use different username.","warning");
                        }else{
                            warning_info();
                            $("#UpdateUserModal").modal('hide');
                        }
                    }

                });
                $("#btn_update_save").prop('disabled',false);
            }
        }
    });

    function showUpdateModal(user_id){
        $("#UpdateUserModal").modal('show');
        $.post("ajax/get_user.php",
            {
                user_id:user_id
            },function(data){
               var get_data = JSON.parse(data);
                $("#update_user_id").val(get_data[0].user_id);
                $("#update_first_name").val(get_data[0].first_name);
                $("#update_middle_name").val(get_data[0].middle_name);
                $("#update_last_name").val(get_data[0].last_name);
                $("#update_username").val(get_data[0].username);
                $("#update_password").val(get_data[0].password);
                $(".update_category").val(get_data[0].category);
        });
    }

    $("#form_add_user").submit(function(e){
        e.preventDefault();
        $("#btn_add").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"ajax/add_user.php",
            data:$("#form_add_user").serialize(),
            success:function(data){
                if(data == 1){
                    $("#addUserModal").modal('hide');
                    success_add();
                    get_UserData();

                    $("#form_add_user").each(function(){
                       this.reset();
                    });
                }else if(data == 2){
                    modified_alert("Oops!","Username already used. Please use different username.","warning");
                }else{
                    warning_info();
                    $("#addUserModal").modal('hide');
                }

            }
        });
        $("#btn_add").prop('disabled', false);
    });

    function get_UserData() {
        $("#user_table").DataTable().destroy();
        $("#user_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/users.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_user' value='"+row.user_id+"'>";                
                }
            },
            {
                "mRender":function(data, type, row){
                    return "<button class='btn btn-info btn-sm btn-fill' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='showUpdateModal("+row.user_id+")'><span class='fa fa-edit'></span></button>";
                }
            },
            {
                "data":"name"
            },
            {
                "data":"category"
            },
            {
                "data":"username"
            },
            {
                "data":"date_added"
            }
            ]
        });
    }

$(document).ready(function() {
    get_UserData();
});
</script>

</div>