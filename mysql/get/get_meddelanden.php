<?php

include "../mysql_database.php";



if (isset($_GET['id_1']) && isset($_GET['id_2'])) {
	$id_1 = $_GET['id_1'];
	$id_2 = $_GET['id_2'];
	
	$query = "SELECT Meddelanden.*, (SELECT Nickname FROM Anvandare WHERE ID=Meddelanden.Anvandare_ID_Avsandare) AS Avs, (SELECT Nickname FROM Anvandare WHERE ID=Meddelanden.Anvandare_ID_Mottagare) AS Mot FROM Meddelanden WHERE ((Anvandare_ID_Avsandare=$id_1 AND Anvandare_ID_Mottagare=$id_2) OR (Anvandare_ID_Mottagare=$id_1 AND Anvandare_ID_Avsandare=$id_2))  GROUP BY Meddelanden.ID ORDER BY Datum_Skapat LIMIT 20";
	$connect = connecttodatabase();
	/*
		SELECT Meddelanden.*,
(SELECT Nickname FROM Anvandare WHERE ID=Meddelanden.Anvandare_ID_Avsandare) AS Avs, 
(SELECT Nickname FROM Anvandare WHERE ID=Meddelanden.Anvandare_ID_Mottagare) AS Mot 
FROM Meddelanden, Anvandare
WHERE ((Anvandare_ID_Avsandare=11 AND Anvandare_ID_Mottagare=12) 
OR (Anvandare_ID_Mottagare=11 AND Anvandare_ID_Avsandare=12)) 
GROUP BY Meddelanden.ID
ORDER BY Datum_Skapat
LIMIT 20
	*/
	
	if($query_run = $connect->query($query)) {
		$txt = "";
		while($result = mysqli_fetch_assoc($query_run)) {
			$txt .= "<Meddelande>";
			
			$txt .= "<Avsandare>";
			$txt .= mb_convert_encoding($result['Avs'], "UTF-8");
			$txt .= "</Avsandare>";
			
			$txt .= "<Mottagare>";
			$txt .= mb_convert_encoding($result['Mot'], "UTF-8") ;
			$txt .= "</Mottagare>";
			
			$txt .= "<Text>";
			$txt .= mb_convert_encoding($result['Text'], "UTF-8");
			$txt .= "</Text>";
			
			$txt .= "<Datum>";
			$txt .= mb_convert_encoding($result['Datum_Skapat'], "UTF-8");
			$txt .= "</Datum>";
			
			$txt .= "</Meddelande>";
		}
		
	} else {
		$txt = "Error running query";
	}
	closeconnection($connect);
	
	header('Content-Type: text/xml');
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";

	echo '<response>';
	
	echo $txt;
	
	echo '</response>';
	
	
}
?>