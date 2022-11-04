<?php 
$fetch = $mysqli->query("SELECT * FROM users WHERE user_id='$user_id'") or die(mysqli_error());
$row = $fetch->fetch_array();

?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-0">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">User Information</h1>
                                </div>
                                <form role="form" method='POST' id="form_user_update">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder="First Name" value="<?=$row['first_name']?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="middle_name"  name="middle_name" placeholder="Middle Name" value="<?=$row['middle_name']?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder="Last Name" value="<?=$row['last_name']?>">
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username"  value="<?=$row['username']?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>

                                     <button type="submit" class="btn btn-primary btn-user btn-block" id="btn_update_save"><i class="fas fa-check-circle"></i> Update Profile</button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
   
    </div>
</div>

<script type="text/javascript">
     $("#form_user_update").submit(function(e){
        e.preventDefault();
        var password = $("#password").val(); 
        if(password==""){
            $("#btn_update_save").prop('disabled',true);
            $.ajax({
                type:"POST",
                url:"ajax/update_profile.php",
                data:$("#form_user_update").serialize(),
                success:function(data){
                    if(data == 1){
                        alert("Success Update!");
                        //notif_update();
                    }else{
                        //notif_failed();
                    }
                }

            });
            $("#btn_update_save").prop('disabled',false);
        }else{
            var confirmthis = confirm("Are you sure you want to update password?");
            if(confirmthis==true){
                $("#btn_update_save").prop('disabled',true);
                $.ajax({
                    type:"POST",
                    url:"ajax/update_profile.php",
                    data:$("#form_user_update").serialize(),
                    success:function(data){
                        if(data == 1){
                            alert("Success Update!");
                            $("#password").val("");
                            //notif_update();
                        }else{
                            //notif_failed();
                        }
                    }

                });
                $("#btn_update_save").prop('disabled',false);
            }

        }

    });
</script>