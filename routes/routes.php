<?php
	$view = "view/";

	if($page == 'dashboard'){
		require $view.'dashboard.php';
	}else if($page == 'users'){
		require $view.'users.php';
	}else if($page == 'patients'){
		require $view.'patients.php';
	}else if($page == 'profile'){
		require $view.'profile.php';
	}else{
		require $view.'404.php';
		
	}
?>