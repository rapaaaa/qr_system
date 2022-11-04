<?php 
	include '../core/config.php';
	unset($_SESSION['user_id']);
	unset($_SESSION["user_type"]);

	session_destroy();
?>