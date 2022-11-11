<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Checkups</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="index.php?page=add_checkup" class="btn btn-primary btn-icon-split btn-sm" >
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add checkup</span>
                    </a>

                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected checkup</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='checkup_table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_checkup')"></th>
                                    <th style="width: 5px;"></th>
                                    <th>Patient</th>
                                    <th>Service</th>
                                    <th>Remarks</th>
                                    <th>Prescription</th>
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
       include 'modals/view_checkup_modal.php';
    ?>

<script type="text/javascript">
    function showDetailsModal(cu_id){
        $("#showCheckupDetails").modal("show");
        $.post("ajax/view_checkup.php",{
            cu_id:cu_id
        },function(data){
            $("#checkup_modal_div").html(data);
        });
    }

    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to continue?");

        if(confirmation == true){
            $.post("ajax/delete_checkups.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_CheckupData();
                }else{
                    warning_info();
                }   
            });
        }
    }

    function get_CheckupData() {
        $("#checkup_table").DataTable().destroy();
        $("#checkup_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/checkups.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_checkup' value='"+row.cu_id+"'>";                
                }
            },
            {
                "mRender":function(data, type, row){
                    return "<button type='button'class='btn btn-info btn-sm btn-fill' style='padding:5px;' data-toggle='tooltip' title='Record Details' onclick='showDetailsModal("+row.cu_id+")'><span class='fa fa-list'></span></button>";
                }
            },
            {
                "data":"patient"
            },
            {
                "data":"service"
            },
            {
                "data":"remarks"
            },
            {
                "data":"prescription"
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
    get_CheckupData();
});
</script>

</div>