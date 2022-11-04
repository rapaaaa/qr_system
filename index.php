<?php 
    include 'core/config.php';
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['category_id'];
    $page = (isset($_GET['page']) && $_GET['page'] !='') ? $_GET['page'] : '';
    userlogin($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Health Center <?= date('Y')?></title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts.googleapis.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" />

</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
       <?php require_once 'components/sidebar.php' ?>
        <!-- End of Sidebar -->

           <!-- Bootstrap core JavaScript-->
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="assets/js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="assets/vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="assets/js/demo/chart-area-demo.js"></script>
            <script src="assets/js/demo/chart-pie-demo.js"></script>
            <script src="assets/datatables/jquery.dataTables.min.js"></script>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once 'components/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php require_once 'routes/routes.php' ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once 'components/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-sign-out-alt"></i> Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancel</button>
                    <a class="btn btn-primary" onclick="logout()"><i class="fas fa-check-circle"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
   $(document).ready(function() { 
    });

    function logout(){
      $.post("ajax/logout.php",{},function(data){
        window.location.href = "auth/login.php";
      });
    }

    function checkAll(ele, ref) {
        var checkboxes = document.getElementsByName(ref);
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        }else{
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }
</script>
</html>