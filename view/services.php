<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Services</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle='modal' data-target='#addServiceModal'>
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add service</span>
                    </a>

                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected service</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='service_table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_service')"></th>
                                    <th style="width: 5px;"></th>
                                    <th>Service</th>
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
        include 'modals/add_service_modal.php';
       	include 'modals/update_service_modal.php';
    ?>

<script type="text/javascript">
    function enableDisableServices(service_id){
        var confirmthis = confirm("Are you sure you want to update status?");
        if(confirmthis==true){
            $.post("ajax/update_service_status.php",{
                service_id:service_id
            },function(data){
               if(data == 1){
                    success_update();
                    get_ServiceData();
                }else{
                    warning_info();
                }  
            });
        }
    }

    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

        if(confirmation == true){
            $.post("ajax/delete_service.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_ServiceData();
                }else{
                    warning_info();
                }   
            });
        }
    }

    $("#form_post_update").submit(function(e){
        e.preventDefault();
        $("#btn_update_save").prop('disabled',true);
        $.ajax({
            type:"POST",
            url:"ajax/update_service.php",
            data:$("#form_post_update").serialize(),
            success:function(data){
                if(data == 1){
                    $("#UpdateServiceModal").modal('hide');
                    success_update();
                    get_ServiceData();
                }else{
                    warning_info();
                    $("#UpdateServiceModal").modal('hide');
                }
            }

        });
        $("#btn_update_save").prop('disabled',false);
    });

    function showUpdateModal(service_id){
        $("#UpdateServiceModal").modal('show');
        $.post("ajax/get_service.php",
            {
                service_id:service_id
            },function(data){
               var get_data = JSON.parse(data);
                $("#update_service_id").val(get_data[0].service_id);
                $("#update_service").val(get_data[0].service);
                $("#update_service_fee").val(get_data[0].service_fee);
        });
    }

    $("#form_add_service").submit(function(e){
        e.preventDefault();
        $("#btn_add").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"ajax/add_service.php",
            data:$("#form_add_service").serialize(),
            success:function(data){
                if(data == 1){
                    $("#addServiceModal").modal('hide');
                    success_add();
                    get_ServiceData();

                    $("#form_add_service").each(function(){
                       this.reset();
                    });
                }else{
                    warning_info();
                    $("#addServiceModal").modal('hide');
                }
            }
        });
        $("#btn_add").prop('disabled', false);
    });

    function get_ServiceData() {
        $("#service_table").DataTable().destroy();
        $("#service_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/services.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_service' value='"+row.service_id+"'>";                
                }
            },
            {
                "mRender":function(data, type, row){
                    return "<button class='btn btn-info btn-sm btn-fill' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='showUpdateModal("+row.service_id+")'><span class='fa fa-edit'></span></button>";
                }
            },
            {
                "data":"service"
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
    get_ServiceData();
});
</script>

</div>