<?php
	include '../core/config.php';
	$app_id = $_POST['app_id'];

  //APPOINTMENT TABLE
	$fetch_appointment = $mysqli->query("SELECT * FROM appointments WHERE app_id='$app_id'") or die(mysqli_error());
	$app_row = $fetch_appointment->fetch_array();

  //PATIENT TABLE
  $fetch_patient = $mysqli->query("SELECT * FROM patients WHERE patient_id='$app_row[patient_id]'") or die(mysqli_error());
  $patient_row = $fetch_patient->fetch_array();

  //PATIENT TABLE
  $fetch_supplies = $mysqli->query("SELECT * FROM supplies ORDER BY name ASC") or die(mysqli_error());

  //CHECKUP TABLE
  $fetch_checkup = $mysqli->query("SELECT * FROM check_ups WHERE app_id='$app_row[app_id]'") or die(mysqli_error());
  $checkup_row = $fetch_checkup->fetch_array();
  $count_check_up = mysqli_num_rows($fetch_checkup);
  $finish_button = $count_check_up>0?"":"display:none;";
  $save_button = $count_check_up>0?"disabled":"";

  //MEDICAL HISTORY
  $fetch_medical_history = $mysqli->query("SELECT * FROM appointments AS a, check_ups AS c WHERE a.app_id=c.app_id AND a.patient_id='$patient_row[patient_id]' AND c.status='1'") or die(mysqli_error());
  $fetch_count_mh = mysqli_num_rows($fetch_medical_history);

  //REFERRAL
  $fetch_referral = $mysqli->query("SELECT * FROM referrals AS r, check_ups AS c WHERE r.cu_id=c.cu_id AND c.app_id='$app_row[app_id]'") or die(mysqli_error());
  $referral_row = $fetch_referral->fetch_array();
?>
<input type="hidden" id='cu_app_id' value="<?= $app_id?>">
<input type="hidden" id='cu_id' value="<?= $checkup_row['cu_id']?>">
<input type="hidden" id='cu_patient_id' value="<?= $patient_row['patient_id']?>">
<div class="col-lg-12">
  <div class="row">
    <div class="col-md-4">
      <div class="col-sm-12" style="border: solid 1px #ccc;border-radius: 5px;padding: 10px;">
        <strong style="color: #4e73df;">Appointment Details:</strong>
        <div class="col-sm-12">
          <div class="card" style="width: 100%">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Name:</strong> <?= $app_id==""?"":patientFullName($patient_row['patient_id'])?></li>
              <!-- <li class="list-group-item"><strong>Time:</strong> <?= $app_id==""?"":date('h:i A',strtotime($app_row['app_time']));?></li> -->
              <li class="list-group-item"><strong>Service:</strong> <?= service_info("service",$app_row['service_id']);?></li>
              <li class="list-group-item"><strong>Description:</strong> <?= $app_row['description'];?></li>
              <!-- <li class="list-group-item"><strong>Encoded by:</strong> <?= $app_id==""?"":userFullName($app_row['user_id']);?></li> -->
              <li class="list-group-item"><strong>Status:</strong> <?= $app_id==""?"":getStatusDisplay($app_row['status'],$app_row['user_id']);?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="col-sm-12" style="border: solid 1px #ccc;border-radius: 5px;padding: 10px;">
        <nav style="font-size: 15px;">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-c-tab" data-toggle="tab" href="#nav-c" role="tab" aria-controls="nav-c" aria-selected="true"><strong>Checkup</strong></a>
            <a class="nav-item nav-link" id="nav-mvu-tab" data-toggle="tab" href="#nav-mvu" role="tab" aria-controls="nav-mvu" aria-selected="false"><strong>Medicines/Vaccines Used</strong></a>
            <a class="nav-item nav-link" id="nav-ref-tab" data-toggle="tab" href="#nav-ref" role="tab" aria-controls="nav-ref" aria-selected="false"><strong>Referral</strong></a>
            <a class="nav-item nav-link" id="nav-mh-tab" data-toggle="tab" href="#nav-mh" role="tab" aria-controls="nav-mh" aria-selected="false"><strong>Medical History</strong></a>
            <a class="nav-item nav-link" id="nav-pp-tab" data-toggle="tab" href="#nav-pp" role="tab" aria-controls="nav-pp" aria-selected="false"><strong>Resident Profile</strong></a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <!------------------------------ CHECKUP-------------------------------------->
          <div class="tab-pane fade show active" id="nav-c" role="tabpanel" aria-labelledby="nav-c-tab"><br>
            <div class="row" style="margin-bottom: 20px;">
              <div class="col-sm-12" style="margin-bottom: 5px;">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><strong>Service:</strong></span></div>
                    <select class="form-control" id='cu_service_id' required>
                          <option value=''>Please choose service:</option>
                          <?php
                            $fetch_service = $mysqli->query("SELECT * FROM services WHERE (status='E' OR status='') ORDER BY service ASC") or die(mysqli_error());
                      while ($service_row = $fetch_service->fetch_array()) {
                        $selected_service = ($checkup_row['service_id']==$service_row['service_id'])?"selected":"";
                        echo "<option value='$service_row[service_id]' $selected_service>".$service_row['service']."</option>";
                      }
                          ?>
                        </select>
                </div>
              </div>

              <div class="col-sm-12" style="margin-bottom: 5px;">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><strong>Prescription:</strong></span></div>
                  <textarea class="form-control" id="cu_prescription" autocomplete="off" rows="4"><?=$checkup_row['prescription']?></textarea>
                </div>
              </div>

              <div class="col-sm-12" style="margin-bottom: 5px;">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><strong>Remarks:</strong></span></div>
                  <textarea class="form-control" id="cu_remarks" autocomplete="off" rows="4"><?=$checkup_row['remarks']?></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <button class="btn btn-success btn-sm" style="float: right;<?=$finish_button?>" onclick='finish_checkup()'><i class="fas fa-check-circle"></i> Finish Checkup</button>
                <button class="btn btn-primary btn-sm" style="float: right;" onclick='save_checkup()' <?=$save_button?>><i class="fas fa-check-circle"></i> Save Data</button>
              </div>
            </div>
          </div>

          <!------------------------------ Medicines/Vaccines Used-------------------------------------->
          <div class="tab-pane fade" id="nav-mvu" role="tabpanel" aria-labelledby="nav-mvu-tab"><br>
            <?php if($count_check_up==0){?>    
              <strong>No data found.</strong>
            <?php }else{?>
              <div class="row" style="margin-bottom: 5px;">
                <div class="col-sm-12">
                  <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><strong>Supply:</strong></span></div>
                      <select class="form-control" id='supply_id' required>
                            <option value=''>Please choose supply:</option>
                            <?php 
                              while ($supply_row = $fetch_supplies->fetch_array()) {
                                echo "<option value='$supply_row[supply_id]'>$supply_row[name]</option>";
                              }
                            ?>
                      </select>
                       <div class="input-group-prepend"><span class="input-group-text"><strong>Quantity:</strong></span></div>
                      <input type="number" class="form-control" id="supply_quantity" autocomplete="off" required>
                      <span type="button" class="btn btn-primary" onclick='save_used_supply()'><i class="fas fa-check-circle"></i> Save Data</span>
                  </div>
                </div>
              </div>

              <hr style="border: solid 1px #ccc;">

              <div class="row" style="margin-bottom: 5px;">
                <div class="col-sm-12">
                  <span type="button" class="btn btn-danger btn-sm" style="float: right;" onclick='delete_cus()'><i class="fas fa-check-circle"></i> Delete Selected Used Supply</span>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                      <table id='cus_table' class="table table-bordered" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_cus')"></th>
                                  <th>Supply</th>
                                  <th>Quantity</th>
                                  <!-- <th>Price</th>
                                  <th>Subtotal</th> -->
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th colspan="2" style="text-align:right">Total:</th>
                                  <th></th>
                              </tr>
                          </tfoot>
                      </table>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>

          <!------------------------------ REFERRAL-------------------------------------->
          <div class="tab-pane fade" id="nav-ref" role="tabpanel" aria-labelledby="nav-ref-tab"><br>
            <?php if($count_check_up>0){ ?>
              <div class="row" style="margin-bottom: 5px;">
                <div class="col-sm-12" style="margin-bottom: 5px;">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><strong>Referred to:</strong></span></div>
                    <input type="text" class="form-control" id="referred_to" autocomplete="off" value="<?=$referral_row['referred_to']?>" required>
                  </div>
                </div>

                <div class="col-sm-12" style="margin-bottom: 5px;">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><strong>Remarks:</strong></span></div>
                    <textarea class="form-control" id="referral_remarks" autocomplete="off" rows="4"><?=$referral_row['referral_remarks']?></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <button class="btn btn-primary btn-sm" style="float: right;" onclick='save_referral()'><i class="fas fa-check-circle"></i> Save Data</button>
                </div>
              </div>

              <hr style="border: solid 1px #ccc;">
            <?php } ?>

            <div class="row" style="margin-bottom: 5px;">
              <div class="col-sm-12">
                <span type="button" class="btn btn-danger btn-sm" style="float: right;" onclick='delete_ref()'><i class="fas fa-check-circle"></i> Delete Selected Referral</span>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                    <table id='ref_table' class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5px;"><input type="checkbox" onchange="checkAll(this, 'check_ref')"></th>
                                <th>Referred to</th>
                                <th>Referral remarks</th>
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

          <!------------------------------ Medical History-------------------------------------->
          <div class="tab-pane fade" id="nav-mh" role="tabpanel" aria-labelledby="nav-mh-tab"><br>
            <?php if($fetch_count_mh==0){?>
              <strong>No data found.</strong>
            <?php }else{?>
              <div class="card-body" style="padding: 0px;">
                <div class="table-responsive">
                  <table id='patient_table' class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Service</th>
                              <th>Prescription</th>
                              <th>Remarks</th>
                              <th>Date Added</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while ($mh_row = $fetch_medical_history->fetch_array()) {
                        ?>
                        <tr>
                          <td><?=service_info("service",$mh_row['service_id'])?></td>
                          <td><?=$mh_row['prescription']?></td>
                          <td><?=$mh_row['remarks']?></td>
                          <td><?=date("F j, Y H:i A",strtotime($mh_row['date_added']));?></td>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            <?php  } ?>
          </div>

           <!------------------------------ PATIENT PROFILE-------------------------------------->
           <div class="tab-pane fade" id="nav-pp" role="tabpanel" aria-labelledby="nav-pp-tab"><br>
              <div class="col-sm-12" style="margin-bottom: 2px;">
                <div class="card" style="width: 100%">
                <div class="card-header"><strong>Name:</strong> <?= $app_id==""?"":patientFullName($patient_row['patient_id'])?></div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Gender:</strong> <?= $app_id==""?"":patientGender($patient_row['gender'])?></li>
                    <li class="list-group-item"><strong>Contact #:</strong> <?= $patient_row['contact_number'];?></li>
                    <li class="list-group-item"><strong>Birdthday:</strong> <?= $app_id==""?"":date("F j, Y",strtotime($patient_row['birthday']))?></li>
                    <li class="list-group-item"><strong>Address:</strong> <?= $patient_row['address']?></li>
                  </ul>
                </div>
              </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>