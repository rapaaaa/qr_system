<?php
	include '../core/config.php';

	if(isset($_POST['update_post_id'])){
		$post_id		= $_POST['update_post_id'];
		$title			= $_POST['update_title'];
		$content		= $_POST['update_content'];	
		$update_data 	= "title = '$title', content = '$content'";

		$mysqli->query("UPDATE posts SET $update_data WHERE post_id = '$post_id' ") or die(mysql_error());
		echo 1;
	}
?>