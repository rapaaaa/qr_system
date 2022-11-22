<?php 
include '../core/config.php';
$date = date('Y-m-d');
$fetch_count_users = $mysqli->query("SELECT * FROM users") or die(mysqli_error());
$fetch_count_patients = $mysqli->query("SELECT * FROM patients") or die(mysqli_error());
$fetch_count_appointments = $mysqli->query("SELECT * FROM appointments WHERE  user_id='0'") or die(mysqli_error());
$fetch_count_checkups = $mysqli->query("SELECT * FROM check_ups") or die(mysqli_error());
?>

<div class="row">
	<div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of Users:</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=users" style="color: #222222;"><?= mysqli_num_rows($fetch_count_users)?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Number of Patients:</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=patients" style="color: #222222;"><?= mysqli_num_rows($fetch_count_patients)?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Appointments:</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="index.php?page=appointments" style="color: #222222;"><?= mysqli_num_rows($fetch_count_appointments)?></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Checkups:</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=check_ups" style="color: #222222;"><?= mysqli_num_rows($fetch_count_checkups)?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</div>