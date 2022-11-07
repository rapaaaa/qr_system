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
	}else{
		require $view.'404.php';
		
	}
?>