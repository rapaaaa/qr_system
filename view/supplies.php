<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Medicine/Vaccine</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle='modal' data-target='#addSupplyModal'>
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add medicine/vaccine</span>
                    </a>

                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected medicine/vaccine</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='supply_table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_supply')"></th>
                                    <th style="width: 5px;"></th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <!-- <th>Price</th> -->
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Remarks</th>
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
        include 'modals/add_supply_modal.php';
        include 'modals/update_supply_modal.php';
    ?>

<script type="text/javascript">
    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

        if(confirmation == true){
            $.post("ajax/delete_supply.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_SupplyData();
                }else{
                    warning_info();
                }   
            });
        }
    }

    $("#form_supply_update").submit(function(e){
        e.preventDefault();
        $("#btn_update_save").prop('disabled',true);
        $.ajax({
            type:"POST",
            url:"ajax/update_supply.php",
            data:$("#form_supply_update").serialize(),
            success:function(data){
                if(data == 1){
                    $("#UpdateSupplyModal").modal('hide');
                    success_update();
                    get_SupplyData();
                }else{
                    warning_info();
                    $("#UpdateSupplyModal").modal('hide');
                }
            }

        });
        $("#btn_update_save").prop('disabled',false);
    });

    function showUpdateModal(supply_id){
        $("#UpdateSupplyModal").modal('show');
        $.post("ajax/get_supply.php",
            {
                supply_id:supply_id
            },function(data){
               var get_data = JSON.parse(data);
                $("#update_supply_id").val(get_data[0].supply_id);
                $("#update_name").val(get_data[0].name);
                $("#update_price").val(get_data[0].price);
                $("#update_description").val(get_data[0].description);
                $("#update_quantity").val(get_data[0].quantity);
                $("#update_remarks").val(get_data[0].remarks);
                $(".update_supply_category").val(get_data[0].supply_category);
        });
    }

    $("#form_add_supply").submit(function(e){
        e.preventDefault();
        $("#btn_add").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"ajax/add_supply.php",
            data:$("#form_add_supply").serialize(),
            success:function(data){
                if(data == 1){
                    $("#addSupplyModal").modal('hide');
                    success_add();
                    get_SupplyData();

                    $("#form_add_supply").each(function(){
                       this.reset();
                    });
                }else{
                    warning_info();
                    $("#addSupplyModal").modal('hide');
                }

            }
        });
        $("#btn_add").prop('disabled', false);
    });

    function get_SupplyData() {
        $("#supply_table").DataTable().destroy();
        $("#supply_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/supplies.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_supply' value='"+row.supply_id+"'>";                
                }
            },
            {
                "mRender":function(data, type, row){
                    return "<button class='btn btn-info btn-sm btn-fill' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='showUpdateModal("+row.supply_id+")'><span class='fa fa-edit'></span></button>";
                }
            },
            {
                "data":"name"
            },
            {
                "data":"category"
            },
            // {
            //     "data":"price"
            // },
            {
                "data":"description"
            },
            {
                "data":"quantity"
            },
            {
                "data":"remarks"
            },
            {
                "data":"date_added"
            }
            ]
        });
    }

$(document).ready(function() {
    get_SupplyData();
});
</script>

</div>