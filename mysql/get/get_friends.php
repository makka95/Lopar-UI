<?php

include "../mysql_database.php";

$txt = "";

if (isset($_GET['id'])) {

	$id = $_GET['id'];

	$connect = connecttodatabase();

	$query = "SELECT Anvandare.Nickname, Anvandare.ID FROM Anvandare, Friends WHERE (Anvandare.ID=Friends.Friend_1 AND Friends.Friend_2=$id) OR (Anvandare.ID=Friends.Friend_2 AND Friends.Friend_1=$id) ORDER BY Anvandare.Nickname";

	$query_run = $connect->query($query);

	while ($result = mysqli_fetch_assoc($query_run)) {
		$txt .= "<User>";

		$txt .= "<Nickname>";
		$txt .= mb_convert_encoding($result['Nickname'], "UTF-8");
		$txt .= "</Nickname>";

		$txt .= "<ID>";
		$txt .= $result['ID'];
		$txt .= "</ID>";

		$txt .= "</User>";
	}
	closeconnection($connect);
	/*

	SELECT Anvandare.Nickname, Anvandare.ID
	FROM Anvandare, Friends
	WHERE (Anvandare.ID=Friends.Friend_1 AND Friends.Friend_2=11)
	OR (Anvandare.ID=Friends.Friend_2 AND Friends.Friend_1=11)

	*/

	header('Content-Type: text/xml');
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes' ?>";

	echo '<response>';

	echo $txt;

	echo '</response>';


}
?>