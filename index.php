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
    <title>QR SYSTEM <?= date('Y')?></title>
    <link rel="icon" href="assets/img/hospital-alt-solid.svg">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts.googleapis.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/notif/notif.css">
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
        <script src="assets/notif/notif.js"></script>
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
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

<?php  require_once 'view/modals/logout_modal.php'; ?>
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

    function success_add(){
      new Notify('Great!','Data is successfully Added.','success');
    }

    function success_update(){
      new Notify('Great!','Data is successfully Updated.','success');
    }

    function success_delete(){
      new Notify('Great!','Data is successfully Deleted.','success');
    }

    function warning_info(){
      new Notify('Warning!','Unable to execute action.','warning');
    }

    function error_query(){
      new Notify('Oops!','Something went wrong. Please contact admin to fix error.','error');
    }

    function modified_alert(title,description,type){
      new Notify(title,description,type);
    }
</script>
</html>