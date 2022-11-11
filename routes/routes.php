<?php
	$view = "view/";

	if($page == 'dashboard'){
		require $view.'dashboard.php';
	}else if($page == 'profile'){
		require $view.'profile.php';
	}else if($page == 'users'){
		require $view.'users.php';
	}else if($page == 'patients'){
		require $view.'patients.php';
	}else if($page == 'supplies'){
		require $view.'supplies.php';
	}else if($page == 'posts'){
		require $view.'posts.php';
	}else if($page == 'appointments'){
		require $view.'appointments.php';
	}else if($page == 'check_ups'){
		require $view.'check_ups.php';
	}else if($page == 'add_checkup'){
		require $view.'add_checkup.php';
	}else if($page == 'services'){
		require $view.'services.php';
	}else{
		require $view.'404.php';
		
	}
?>