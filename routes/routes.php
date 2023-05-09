<?php
	$view = "view/";
	//user_type==1(admin) ||/user_type==2(doctor)||/user_type==3(healthworker)

	if($page == 'dashboard' || $page == ''){
		require $view.'dashboard.php';
	}else if($page == 'profile'){
		require $view.'profile.php';
	}else if($page == 'users' && $user_type==1){  //admin only
		require $view.'users.php';
	}else if($page == 'patients'){
		require $view.'patients.php';
	}else if($page == 'supplies'){
		require $view.'supplies.php';
	}else if($page == 'posts'){
		require $view.'posts.php';
	}else if($page == 'appointments'){
		require $view.'appointments.php';
	}else if($page == 'check_ups' && ($user_type==1 || $user_type==2)){ //admin and doctor
		require $view.'check_ups.php';
	}else if($page == 'add_checkup' && ($user_type==1 || $user_type==2)){ //admin and doctor
		require $view.'add_checkup.php';
	}else if($page == 'services'){
		require $view.'services.php';
	}else if($page == 'checkup_per_service_report'){
		require $view.'checkup_per_service_report.php';
	}else if($page == 'inventory_report'){
		require $view.'inventory_report.php';
	}else if($page == 'doctor_schedule'){
		require $view.'doctor_schedule.php';
	}else if($page == 'feedback'){
		require $view.'feedback.php';
	}else{
		require $view.'404.php';
	}
?>