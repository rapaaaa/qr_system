<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QR SYSTEM <?= date('Y')?></title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/fonts.googleapis.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> QR SYSTEM FOR VACCINATION AND MEDICATION OF BARANGAY ZONE 6</h1>
                                    </div>
                                    <h5 style="color: #d12727;display: none;" id="error">Incorrect Username & Password</h5>
                                    <form role="form" method="POST" id="form_submit">
                                        
                                        <div class="input-group" style="margin-bottom: 10px;">
                                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name='username'>
                                        </div>

                                        <div class="input-group" style="margin-bottom: 10px;">
                                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                          <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name='password'>
                                        </div>
                                         <button type="submit" class="btn btn-primary btn-user btn-block" id="btn_submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                                        <hr>
                                    </form>
                                    <!-- <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>
</body>

<script type="text/javascript">
    $("#form_submit").submit(function(e){
        e.preventDefault();
        $("#btn_submit").prop('disabled', true);
        $.ajax({
            type:"POST",
            url:"../ajax/login.php",
            data:$("#form_submit").serialize(),
            success:function(data){
              if(data == 1){
                window.location.href = "../index.php?page=dashboard";
              }else{
                document.getElementById("error").style.display = "";
                 $("#frm_submit").each(function(){
                    this.reset();
                });
              }
              $("#btn_submit").prop('disabled', false);
            }
          });
    });
</script>

</html>