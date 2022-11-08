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
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" onclick="addCheckupModal()">
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
                                    <th>Remarks</th>
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
        include 'modals/add_checkup_modal.php';
    ?>

<script type="text/javascript">
    function addCheckupModal(){
        $("#addCheckupModal").modal('show');
      	get_appointments();
    }

    function get_appointments(){
    	$.post("ajax/get_checkup_appointments.php",
    	function(data){
    		$("#appointments").html(data);
    	});
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
                    return "<button type='button'class='btn btn-info btn-sm btn-fill' style='padding:5px;' data-toggle='tooltip' title='Update Record' onclick='showUpdateModal("+row.cu_id+")'><span class='fa fa-edit'></span></button>";
                }
            },
            {
                "data":"patient"
            },
            {
                "data":"remarks"
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