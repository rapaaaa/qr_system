<?php
	include '../core/config.php';

	if(isset($_POST['title'])){
		$user_id 		= $_SESSION['user_id'];
		$title 			= $mysqli->real_escape_string($_POST['title']);
		$content 		= $mysqli->real_escape_string($_POST['content']);
		$date_added 	= $system_date;


		$sql = $mysqli->query("INSERT INTO posts SET user_id = '$user_id', title = '$title', content = '$content', date_added = '$date_added'") OR die(mysql_error());
		
		echo 1;
	}
	
?>