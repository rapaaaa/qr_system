<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "u981310152_qrsystem_root");
	define("DB_PASSWORD", "yH6FI8o*?");
	define("DB_DATABASE", "u981310152_qrsystem_db");

	/*define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_DATABASE", "health_center_db");*/


	
	ini_set('date.timezone','UTC');
	//error_reporting(E_ALL);
	date_default_timezone_set('UTC');
	$today = date('H:i:s');
	$system_date = date('Y-m-d H:i:s', strtotime($today)+28800);
	
	session_start();

	$mysqli = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	$mysqli->query("SET SESSION sql_mode=''");

	// Check connection
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}

	require_once  __DIR__ .'/my_functions.php';

	function userlogin($session_user_id){
		$session_user_id==''?header("Location: auth/login.php"):'';
	}
?>