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

  //MEDICAL HISTORY
  $fetch_medical_history = $mysqli->query("SELECT * FROM appointments AS a, check_ups AS c WHERE a.app_id=c.app_id AND a.patient_id='$patient_row[patient_id]'") or die(mysqli_error());
  $fetch_count_mh = mysqli_num_rows($fetch_medical_history);
?>
<input type="hidden" id='cu_app_id' value="<?= $app_id?>">
<input type="hidden" id='cu_id' value="<?= $checkup_row['cu_id']?>">
<div class="col-lg-12">
  <div class="row">
    <div class="col-md-4">
      <div class="col-sm-12" style="border: solid 1px #ccc;border-radius: 5px;">
        <strong style="color: #4e73df;">Appointment Details:</strong>
        <div class="col-sm-12">
          <div class="card" style="width: 100%">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Time:</strong> <?= $app_id==""?"":date('h:i A',strtotime($app_row['app_time']));?></li>
              <li class="list-group-item"><strong>Description:</strong> <?= $app_row['description'];?></li>
              <li class="list-group-item"><strong>Encoded by:</strong> <?= $app_id==""?"":userFullName($app_row['user_id']);?></li>
              <li class="list-group-item"><strong>Status:</strong> <?= $app_id==""?"":getStatusDisplay($app_row['status']);?></li>
            </ul>
          </div>
        </div>

       <hr style="border: solid 1px #ccc;margin-bottom: 2px;">

        <strong style="color: #4e73df;">Patient Profile:</strong>
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
    <div class="col-md-8">
      <div class="col-sm-12" style="border: solid 1px #ccc;border-radius: 5px;padding: 10px">
        <!------------------------------ Medical History-------------------------------------->

        <div class="card shadow mb-1">
              <!-- Card Header - Accordion -->
                <a href="#collapseCardExampleCU" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExampleCU">
                    <h6 class="m-0 font-weight-bold text-primary">Checkup</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExampleCU">
                    <div class="card-body">
                      <div class="row" style="margin-bottom: 5px;">
                        <div class="col-sm-6">
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><strong>Prescription:</strong></span></div>
                            <textarea class="form-control" id="cu_prescription" autocomplete="off"><?=$checkup_row['prescription']?></textarea>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><strong>Remarks:</strong></span></div>
                            <textarea class="form-control" id="cu_remarks" autocomplete="off"><?=$checkup_row['remarks']?></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-12">
                          <span type="button" class="btn btn-success" style="float: right;<?=$finish_button?>" onclick='finish_checkup()'><i class="fas fa-check-circle"></i> Finish Checkup</span>
                          <span type="button" class="btn btn-primary" style="float: right;" onclick='save_checkup()'><i class="fas fa-check-circle"></i> Save Data</span>
                        </div>
                      </div>
                    </div>
                </div>
          </div>

        <!------------------------------ Medicines/Vaccines Used-------------------------------------->

          <div class="card shadow mb-1">
              <!-- Card Header - Accordion -->
                <a href="#collapseCardExampleMVU" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                    role="button" aria-expanded="false" aria-controls="collapseCardExampleMVU">
                    <h6 class="m-0 font-weight-bold text-primary">Medicines/Vaccines Used</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExampleMVU">
                    <?php if($count_check_up==0){?>    
                      <div class="card-body"><strong>No data found.</strong></div>
                    <?php }else{?>
                    <div class="card-body">
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
                                          <th>Price</th>
                                          <th>Subtotal</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th colspan="4" style="text-align:right">Total:</th>
                                          <th></th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                </div>
          </div>

        <!------------------------------ Medical History-------------------------------------->

          <div class="card shadow mb-1">
            <!-- Card Header - Accordion -->
              <a href="#collapseCardExampleMH" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                  role="button" aria-expanded="false" aria-controls="collapseCardExampleMH">
                  <h6 class="m-0 font-weight-bold text-primary">Medical History</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="collapseCardExampleMH">
                 
                  <?php if($fetch_count_mh==0){?>
                     <div class="card-body"><strong>No data found.</strong></div>
                  <?php }else{?>
                  <div class="card-body" style="padding: 0px;">
                    <div class="table-responsive">
                      <table id='patient_table' class="table table-bordered" width="100%" cellspacing="0">
                          <thead>
                              <tr>
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
        </div>
      </div>
    </div>
  </div>
</div>