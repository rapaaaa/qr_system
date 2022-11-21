<?php 

include __DIR__ . '/variables.php';

ini_set('date.timezone','UTC');
//error_reporting(E_ALL);
date_default_timezone_set('UTC');
$today = date('H:i:s');
$system_date = date('Y-m-d H:i:s', strtotime($today)+28800);

session_start();

$host 	  = host;
$username = username;
$password = password;
$database = database;

//@mysqli_connect($host, $username, $password) or die("Cannot connect to MySQL Server");
//@mysqli_select_db($database) or die ("Cannot connect to Database");
//@mysqli_query("SET SESSION sql_mode=''");

$mysqli_connect = new mysqli($host, $username, $password, $database);
$mysqli_connect->query("SET SESSION sql_mode=''");

if(mysqli_connect_error()){
	die("Connection failed : ". mysqli_connect_error());
}

if (empty($_SESSION['token'])) {
    if (function_exists('mcrypt_create_iv')) {
        $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    } else {
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}
$token = $_SESSION['token'];


foreach(unserialize(VALUE) as $val){
	if(!empty($val)){
		include  __DIR__ .'/'.$val;
	}
}