<?php

include "../mysql_database.php";

if (isset($_GET['id']) && isset($_GET['val'])) {
	switch ($_GET['val']) {
		case "alla":
			$query = "SELECT Status, Type, Text, Datum FROM Notifikationer WHERE Anvandare_ID=" . $_GET['id'];
			break;
			
		case "evt":
			$query = "SELECT Status, Type, Text, Datum FROM Notifikationer WHERE (Anvandare_ID=" . $_GET['id'] . " AND Type=1)";
			break;
		
		case "forum":
			$query = "SELECT Status, Type, Text, Datum FROM Notifikationer WHERE (Anvandare_ID=" . $_GET['id'] . " AND Type=2)";
			break;
	
		case "blogg":
			$query = "SELECT Status, Type, Text, Datum FROM Notifikationer WHERE (Anvandare_ID=" . $_GET['id'] . " AND Type=3)";
			break;
	}
	
	$connect = connecttodatabase();
	
	$mysql_run = $connect->query($query);
	
	header('Content-Type: text/xml');
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";

	echo '<response>';
	
	while($result = mysqli_fetch_assoc($mysql_run)) {
		echo '<Notis>';
		
			echo '<Text>';
				echo mb_convert_encoding($result['Text'], "UTF-8");
			echo '</Text>';
			
			echo '<Type>';
				echo mb_convert_encoding($result['Type'], "UTF-8");
			echo '</Type>';
			
			echo '<Datum>';
				echo mb_convert_encoding($result['Datum'], "UTF-8");
			echo '</Datum>';
			
			echo '<Status>';
				echo mb_convert_encoding($result['Status'], "UTF-8");
			echo '</Status>';
		
		
		echo '</Notis>';
	}
	
	echo '</response>';
	
	closeconnection($connect);
}


?>