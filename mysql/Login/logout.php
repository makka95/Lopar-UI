<?php
	include "../mysql.php";

	
	logout();
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>