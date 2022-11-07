<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6">
            <div style="border: solid 1px #d8d8d8;border-radius: 5px;padding: 20px;">
                <h4>
                    <span>
                        <strong>Posts</strong>
                        <input type="date" class="form-control-sm" id="dp_date" onchange="get_dashboard_post()" style="float: right;float: right;border: solid 1px #ccc;color: #7a7a7a;" value="<?= date('Y-m-d'); ?>">
                    </span>
                 </h4>
                <hr style="border: solid 1px #d8d8d8;">
               <div id="dashboard_posts" style="overflow-y: scroll; height:400px;"></div>

            </div>
        </div>

        <div class="col-md-6">
            <div style="border: solid 1px #d8d8d8;border-radius: 5px;padding: 20px;">
                 <div id="dashboard_display"></div>
            </div>
        </div>

    <!-- <div class="col-md-12">
        <h3>QR SYSTEM FOR VACCINATION AND MEDICATION OF BRGY. ZONE 6</h3>
    </div> -->
</div>

<script type="text/javascript">
function get_dashboard_post(){
    var dp_date = $("#dp_date").val();
    $.post("ajax/dashboard_posts.php",{
        dp_date:dp_date
    },function(data){
        $("#dashboard_posts").html(data);
    });
}

function get_dashboard_display(){
    $.post("ajax/dashboard_display.php",{
    },function(data){
        $("#dashboard_display").html(data);
    });
}

$(document).ready(function() {
    get_dashboard_post();
    get_dashboard_display()
});
</script>