<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle='modal' data-target='#addPostModal'>
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">Add post</span>
                    </a>

                     <a href="#" class="btn btn-danger btn-icon-split btn-sm" onclick="deleteEntry()">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete selected post</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id='post_table' class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_post')"></th>
                                    <th style="width: 5px;"></th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Content</th>
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
        include 'modals/add_post_modal.php';
        include 'modals/update_post_modal.php';
    ?>

<script type="text/javascript">
    function deleteEntry(){
        var checkedValues = $('.delete_check_box:checkbox:checked').map(function() {
            return this.value;
        }).get();
        id = [];

        var confirmation = confirm("Are you sure you want to delete?");

        if(confirmation == true){
            $.post("ajax/delete_post.php",
            {
                id:checkedValues
            },function(data){
                if(data == 1){
                    success_delete();
                    get_PostData();
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
            url:"ajax/update_post.php",
            data:$("#form_post_update").serialize(),
            success:function(data){
                if(data == 1){
                    $("#UpdatePostModal").modal('hide');
                    success_update();
                    get_PostData();
                }else{
                    warning_info();
                    $("#UpdatePostModal").modal('hide');
                }
            }

        });
        $("#btn_update_save").prop('disabled',false);
    });

    function showUpdateModal(post_id){
        $("#UpdatePostModal").modal('show');
        $.post("ajax/get_post.php",
            {
                post_id:post_id
            },function(data){
               var get_data = JSON.parse(data);
                $("#update_post_id").val(get_data[0].post_id);
                $("#update_title").val(get_data[0].title);
                $("#update_content").val(get_data[0].content);
        });
    }

    $("#form_add_post").submit(function(e){
        e.preventDefault();
        $("#btn_add").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"ajax/add_post.php",
            data:$("#form_add_post").serialize(),
            success:function(data){
                if(data == 1){
                    $("#addPostModal").modal('hide');
                    success_add();
                    get_PostData();

                    $("#form_add_post").each(function(){
                       this.reset();
                    });
                }else{
                    warning_info();
                    $("#addPostModal").modal('hide');
                }

            }
        });
        $("#btn_add").prop('disabled', false);
    });

    function get_PostData() {
        $("#post_table").DataTable().destroy();
        $("#post_table").DataTable({
            "responsive": true,
            "processing": true,
            "ajax":{
                "type":"POST",
                "url":"ajax/datatables/posts.php",
                "dataSrc":"data", 
            },
            "columns":[
            {
                "mRender": function(data,type,row){
                    return "<input type='checkbox' class='delete_check_box' name='check_post' value='"+row.post_id+"'>";                
                }
            },
            {
                "mRender":function(data, type, row){
                    return "<button class='btn btn-info btn-sm btn-fill' style='padding: 5px 5px 5px 8px;' data-toggle='tooltip' title='Update Record' onclick='showUpdateModal("+row.post_id+")'><span class='fa fa-edit'></span></button>";
                }
            },
            {
                "data":"author"
            },
            {
                "data":"title"
            },
            {
                "data":"content"
            },
            {
                "data":"date_added"
            }
            ]
        });
    }

$(document).ready(function() {
    get_PostData();
});
</script>

</div>