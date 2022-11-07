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
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <div class="input-group-prepend"><span class="input-group-text"><strong>First Name:</strong></span></div>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$row['first_name']?>" autocomplete='off'>
                                    </div>

                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <div class="input-group-prepend"><span class="input-group-text"><strong>Middle Name:</strong></span></div>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?=$row['middle_name']?>" autocomplete='off'>
                                    </div>

                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <div class="input-group-prepend"><span class="input-group-text"><strong>Last Name:</strong></span></div>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?=$row['last_name']?>" autocomplete='off'>
                                    </div>

                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <div class="input-group-prepend"><span class="input-group-text"><strong>Username:</strong></span></div>
                                        <input type="text" class="form-control" id="username" name="username" value="<?=$row['username']?>" autocomplete='off'>
                                    </div>

                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <div class="input-group-prepend"><span class="input-group-text"><strong>Password:</strong></span></div>
                                        <input type="text" class="form-control" id="password" name="password" autocomplete='off'>
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
                        success_update();
                    }else{
                        warning_info();
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
                            success_update();
                        }else{
                            warning_info();
                        }
                    }

                });
                $("#btn_update_save").prop('disabled',false);
            }

        }

    });
</script>