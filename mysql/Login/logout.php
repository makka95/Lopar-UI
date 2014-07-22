<?php
	include "mysql.php";

	
	logout();
	
	setcookie("login", $id, (time()-60*60*24*30));
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>