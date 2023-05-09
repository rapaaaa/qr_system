<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Feedback</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected feedback</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_feedback')"></th>
                                    <th>User</th>
                                    <th>Feedback</th>
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


<script type="text/javascript">
    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

        if(confirmation == true){
            $.post("ajax/delete_feedback.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_data();
                }else{
                    warning_info();
                }   
            });
        }
    }

    function get_data() {
        $("#table").DataTable().destroy();
        $("#table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/feedback.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_feedback' value='"+row.id+"'>";                
                }
            },
            {
                "data":"user"
            },
            {
                "data":"feedback"
            },
            {
                "data":"date_added"
            }
            ]
        });
    }

$(document).ready(function() {
    get_data();
});
</script>

</div>