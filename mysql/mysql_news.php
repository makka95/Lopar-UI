<?php


function get_news () {
	$connect = connecttodatabase();

	$query = "SELECT ID FROM News ORDER BY ID DESC";
	$query_run = $connect->query($query);
	$count = 1;

	while ($query_result = mysqli_fetch_assoc($query_run)) {
		$id = $query_result['ID'];
		print '<div class="news"><div class="news_subject">';
		$new_query = "SELECT Subject,Text,Datum FROM News WHERE ID=" . $id;
		$new_query_run = $connect->query($new_query);
		$new_query_result = mysqli_fetch_assoc($new_query_run);
		print '<a href="news.php?id=' . $id . '" class="news"><h1>' .  mb_convert_encoding($new_query_result['Subject'], "UTF-8") . '</h1></a><span class="news_date">' .  date("Y-m-d H:i", time($new_query_result['Datum'])) . '</span></div>';
		print '<div class="news_text content_text"><div class="news_img_contain"><img src="Bilder/news_image.jpg" alt="Springer"></div>' .  mb_convert_encoding($new_query_result['Text'],"UTF-8") . '</div>';
		print '</div>';
		$count++;

		/* http://jsfiddle.net/LBH5h/ */
	}



	closeconnection($connect);
}

function get_blogg () {
	$connect = connecttodatabase();

	$query = "SELECT ID FROM News ORDER BY ID DESC";
	$query_run = $connect->query($query);
	$count = 1;

	while ($query_result = mysqli_fetch_assoc($query_run)) {
		$id = $query_result['ID'];
		print '<div class="news"><div class="news_subject">';
		$new_query = "SELECT Subject,Text,Datum FROM News WHERE ID=" . $id;
		$new_query_run = $connect->query($new_query);
		$new_query_result = mysqli_fetch_assoc($new_query_run);
		print '<a href="news.php?id=' . $id . '" class="news"><h1>' .  mb_convert_encoding($new_query_result['Subject'], "UTF-8") . '</h1></a><span class="news_date">' . date("Y-m-d", time($new_query_result['Datum'])) . '</span></div>';
		print '<div class="news_text"><span class="news_text">' .  mb_convert_encoding($new_query_result['Text'], "UTF-8") . '</span></div>';
		print '</div>';
		$count++;

		/* http://jsfiddle.net/LBH5h/ */
	}



	closeconnection($connect);
}

function change_news() {
	$connect = connecttodatabase();

	if ($_GET['lst_id'] != null) {
		$id = $_GET['lst_id'] - 1;
	}
	else {
		$query = "SELECT ID FROM Blogg ORDER BY ID DESC LIMIT 1";
		$query_result = mysqli_fetch_assoc($connect->query($query));
		$id = $query_result['ID'];
	}

	$nxt_id = $id + 2;
	$_SESSION['blogg_id'] = $id;
	$query = "SELECT * FROM Blogg WHERE ID=$id";
	$query_result = mysqli_fetch_assoc($connect->query($query));
	echo '<form action="news_change.php" method="post">�mne: <textarea rows="1" columns="50" name="subject">';
	echo $query_result['Subject'];
	echo '</textarea><br><br>';
	echo 'Text: <textarea rows="20" columns="100" name="text">';
	echo $query_result['Text'];
	echo '</textarea><br>';
	echo '<input type="submit" name="submit" value="�ngra">';
	echo '<input type="submit" name="submit" value="Ta Bort">';
	echo '<input type="submit" name="submit" value="�ndra"></form><br><br>';
	echo '<a class="newsbutton" href="change_news.php?lst_id=' . $id . '">F�rra</a>';
	echo '<a class="newsbutton" href="change_news.php?lst_id=' . $nxt_id . '">N�sta</a>';

	closeconnection($connect);

	echo '<div class="new_news"><form action="skapa_news.php" method="post">�mne: <textarea rows="1" columns="50" name="amne"></textarea><br><br>Text: <textarea rows="20" columns="100" name="texten"></textarea><br><input type="submit" value="Skapa"></form></div>';
}

function skapa_news() {

	$connect = connecttodatabase();

	$subj = $_POST['amne'];
	$text = $_POST['texten'];
	$id = $_COOKIE['login'];

	$query = "INSERT INTO News (Subject, Text, Skapare) VALUES ('" . $subj . "','" . $text . "', " . $id . ")";
	$query_run = $connect->query($query);


	closeconnection($connect);

}

function remove_news() {

	$connect = connecttodatabase();

	$submit = $_POST['submit'];

	if ($submit == "�ngra") {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else if ($submit == "Ta Bort") {
		$subj = $_POST['subject'];
		$text = $_POST['text'];

		$query = 'DELETE FROM News WHERE Subject="' . $subj . '" AND Text="' . $text . '"';
		$query_run = $connect->query($query);

		header('Location: change_news.php');
	} else if ($submit == "�ndra") {
		$subj = $_POST['subject'];
		$text = $_POST['text'];
		$id = $_SESSION['news_id'];

		$query = 'UPDATE News SET Subject="' . $subj . '", Text="' . $text . '" WHERE ID=' . $id;
		$query_run = $connect->query($query);

		header('Location: change_news.php');
	}

	closeconnection($connect);

}

function display_news() {

	$connect = connecttodatabase();

	$id = $_GET['id'];

	$query = "SELECT * FROM News WHERE ID='" . $id . "'";
	$query_run = $connect->query($query);
	$query_result = mysqli_fetch_assoc($query_run);

	print '<div class="news"><div class="news_subject"><h1>' . mb_convert_encoding($query_result['Subject'], "UTF-8") . '</h1>';
	print '<span class="news_date">' .  date("Y-m-d H:i", $new_query_result['Datum']) . '</span></div>';
	print '<div class="content_text news_body"><div class="news_img_contain"><img src="Bilder/news_image.jpg" alt="Springer"></div>';
	print mb_convert_encoding($query_result['Text'], "UTF-8");
	print '</div></div>';

	closeconnection($connect);
}

function get_arkiv_news() {
	$connect = connecttodatabase();

	$query = "SELECT ID, Subject, MONTH(Datum) as date_month, YEAR(Datum) as date_year FROM News ORDER BY Datum ASC";
	$query_run = $connect->query($query);

	$contain = array();

	while($query_result = mysqli_fetch_assoc($query_run)) {
		$contain[$query_result['date_year']][$query_result['date_month']][$query_result['ID']] = $query_result['Subject'];
	}

	if ($contain != null) {
		print '<ul class="year">';
		foreach ($contain as $year => $months) {
			print '<li>' . $year . '</li>';
			print '<ul class="months" id="' . $year . '">';
			foreach ($months as $month => $subjects) {
				print '<li>' . get_month($month) . '</li>';
				print '<ul class="links">';
				foreach ($subjects as $id => $subject) {
					print '<li><a href="news.php?id=' . $id . '" class="' . get_month($month) . '" id="' . $year . '">' . mb_convert_encoding($subject, "UTF-8")  . '</a></li>';
				}
				print '</ul>';
			}
			print '</ul>';
		}
		print '</ul>';
	} else {
		print "Inga Nyheter Hittades";
	}

	closeconnection($connect);
}

function sok_nyheter() {

	if ((isset($_POST['fras']) && $_POST['fras'] != null) || (isset($_POST['datumf']) && $_POST['datumf'] != null) || (isset($_POST['datumt']) && $_POST['datumt'] != null)) {
		$sok = "";
		$date = "";

		if ($_POST['fras'] != "") {
			$sok = "(Text LIKE '%" . $_POST['fras'] . "%' OR Subject LIKE '%" . $_POST['fras'] . "%')";
		}
		if ($_POST['datumf'] != "") {
			if ($_POST['datumt'] != "") {
				$date = "(Datum BETWEEN '" . $_POST['datumf'] . "' AND '" . $_POST['datumt'] . "')";
			} else if ($_POST['datumt'] == "") {
				$date = "(Datum >= '" . $_POST['datumf'] . "')";
			}
		} else if ($_POST['datumt'] != ""){
			$date = "(Datum >= '" . $_POST['datumt'] . "')";
		}

		$query = "";
		if ($date != "" && $sok != "") {
			$query = "SELECT *,
			(LENGTH(`Text`) - LENGTH(REPLACE(`Text`, '" . $_POST['fras'] . "', ''))) / LENGTH('" . $_POST['fras'] . "') `appears_in_text`,
			(LENGTH(`Subject`) - LENGTH(REPLACE(`Subject`, '" . $_POST['fras'] . "', ''))) / LENGTH('" . $_POST['fras'] . "') `appears_in_subject`,
			(LENGTH(CONCAT(`Text`,' ',`Subject`)) - LENGTH(REPLACE(CONCAT(`Text`,' ',`Subject`), '" . $_POST['fras'] . "', ''))) / LENGTH('" . $_POST['fras'] . "') `occurences`
			FROM News WHERE " . $sok . " AND " . $date . " ORDER BY occurences DESC";
		} else if ($date != "" && $sok == "") {
			$query = "SELECT * FROM News WHERE " . $date . " ORDER BY Datum";
		} else if ($date == "" && $sok != "") {
			$query = "SELECT *,
			(LENGTH(`Text`) - LENGTH(REPLACE(`Text`, '" . $_POST['fras'] . "', ''))) / LENGTH('" . $_POST['fras'] . "') `appears_in_text`,
			(LENGTH(`Subject`) - LENGTH(REPLACE(`Subject`, '" . $_POST['fras'] . "', ''))) / LENGTH('" . $_POST['fras'] . "') `appears_in_subject`,
			(LENGTH(CONCAT(`Text`,' ',`Subject`)) - LENGTH(REPLACE(CONCAT(`Text`,' ',`Subject`), '" . $_POST['fras'] . "', ''))) / LENGTH('" . $_POST['fras'] . "') `occurences`
			FROM News WHERE " . $sok . " ORDER BY occurences DESC";
		}
		$connect = connecttodatabase();
		$query_run = $connect->query($query);
		while ($query_result = mysqli_fetch_assoc($query_run)) {
			print '<div class="news">';

			print '<div class="news_subject">';
			print '<a class="news" href="news.php?id=' . $query_result['ID'] . '"><h1>' . $query_result['Subject'] . '</h1></a>';
			print '<span class="news_date">' . $query_result['Datum'] . '</span>';
			print '</div>';

			print '<div class="news_text"><span class="content">';
			print $query_result['Text'];
			print '</span></div>';

			print '</div>';
		}
		closeconnection($connect);
	}
}

function get_nyhet_forum() {
	$connect = connecttodatabase();

	$query = "SELECT ";
	/*

	SELECT Posts.Time, Threads.Subject, SUM(SELECT Posts.ID FROM Posts WHERE Posts.Thread_id=Threads.ID) AS ans
FROM Posts
INNER JOIN Threads
ON Posts.Thread_id=Threads.ID
ORDER BY Time DESC
LIMIT 0,10

	*/
	closeconnection($connect);
}
?>