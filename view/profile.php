<?php 
$fetch = $mysqli->query("SELECT * FROM users WHERE user_id='$user_id'") or die(mysqli_error());
$row = $fetch->fetch_array();
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <section style="background-color: #eee;">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <img src="assets/img/default_profile_pic.jpeg" alt="avatar"
                      class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3"><span id="img_sec_fullname"></span></h5>
                    <p class="text-muted mb-1"><span id="img_sec_category"></span></p>
                  </div>
                </div>
              
              </div>
              <div class="col-lg-8">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0"></p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0">
                            <button class="btn btn-default btn-user btn-sm" id="btn_update_save" style="float: right;"  onclick='showUpdatePasswordModal()'><i class="fas fa-lock"></i> Edit Password</button>
                             <button class="btn btn-default btn-user btn-sm" id="btn_update_save" style="float: right;"  onclick='showUpdateModal()'><i class="fas fa-edit"></i> Edit Profile</button>
                             <input type="hidden" id="user_id" value="<?= $row['user_id']?>">
                        </p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0"><strong>Full Name:</strong></p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0"><span id='list_sec_fullname'></span></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0"><strong>Username:</strong></p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0"><span id='img_sec_username'></span></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0"><strong>Contact Number:</strong></p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0"><span id='img_sec_contact_number'></span></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <p class="mb-0"><strong>Address:</strong></p>
                      </div>
                      <div class="col-sm-9">
                        <p class="text-muted mb-0"><span id='img_sec_address'></span></p>
                      </div>
                    </div>
                  </div>
                </div>
           
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

</div>

<?php 
  include 'modals/update_profile_modal.php';
  include 'modals/update_password_modal.php';
?>

<script type="text/javascript">
    function showUpdatePasswordModal(){
      $("#updatePasswordModal").modal('show');
    }

    $("#form_password_update").submit(function(e){
      e.preventDefault();
      $("#btn_update_password_save").prop('disabled',true);
      $.ajax({
          type:"POST",
          url:"ajax/update_password.php",
          data:$("#form_password_update").serialize(),
          success:function(data){
            if(data == 1){
              success_update();
              $("#form_password_update").each(function(){
                 this.reset();
              });
              
              $("#updatePasswordModal").modal('hide');
            }else if(data==2){
              modified_alert("Oops!","The current password is incorrect.","warning");
            }else if(data==3){
              modified_alert("Oops!","The new passwords do not match.","warning");
            }else{
              warning_info();
            }
          }
      });
      $("#btn_update_password_save").prop('disabled',false);
    });

    $("#form_profile_update").submit(function(e){
      e.preventDefault();
      $("#btn_update_save").prop('disabled',true);
      $.ajax({
          type:"POST",
          url:"ajax/update_profile.php",
          data:$("#form_profile_update").serialize(),
          success:function(data){
              if(data == 1){
                  success_update();
                  getProfile();
                  $("#updateProfileModal").modal('hide');
              }else if(data == 2){
                  modified_alert("Oops!","Username already used. Please use different username.","warning");
                  getProfile();
              }else{
                  warning_info();
              }
          }
      });
      $("#btn_update_save").prop('disabled',false);
    });

    function showUpdateModal(){
      $("#updateProfileModal").modal('show');
      getProfile();
    }

    function getProfile(){
        var user_id = $("#user_id").val();
        $.post("ajax/get_user.php",
            {
                user_id:user_id
            },function(data){
               var get_data = JSON.parse(data);
                $("#update_user_id").val(get_data[0].user_id);
                $("#update_first_name").val(get_data[0].first_name);
                $("#update_middle_name").val(get_data[0].middle_name);
                $("#update_last_name").val(get_data[0].last_name);
                $("#update_username").val(get_data[0].username);
                $("#update_password").val(get_data[0].password);
                $("#update_contact_number").val(get_data[0].contact_number);
                $("#update_address").val(get_data[0].address);
                $(".update_category").val(get_data[0].category);

                //profile display
                $("#img_sec_fullname").html(get_data[0].first_name+" "+get_data[0].last_name);
                $("#img_sec_category").html(get_data[0].category_display);

                $("#list_sec_fullname").html(get_data[0].first_name+" "+get_data[0].middle_name+" "+get_data[0].last_name);
                $("#img_sec_username").html(get_data[0].username);
                $("#img_sec_contact_number").html(get_data[0].contact_number);
                $("#img_sec_address").html(get_data[0].address);

                //PASSWORD
                $("#update_password_user_id").val(get_data[0].user_id);
        });
    }

    $(document).ready(function() {
        getProfile();
    });
</script>