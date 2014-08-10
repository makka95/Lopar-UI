<?php

include "../mysql/mysql.php";

function display_categories () {

	$connect = connecttodatabase();
	echo '<div class="categorie" id="group">Löpning</div>';

	$query = "SELECT * FROM Categories WHERE Categorie_group=0";
	$query_run = $connect->query($query);
	while ($query_result = mysqli_fetch_assoc($query_run)) {

		$new_query = "SELECT * FROM Threads WHERE Categorie_id=" . $query_result['ID'];
		$new_query_run = $connect->query($new_query);
		$num_rows_threads = mysqli_num_rows($new_query_run);
		
		$new_query = "SELECT * FROM Posts WHERE Cat_id=" . $query_result['ID'];
		$new_query_run = $connect->query($new_query);
		$num_rows_posts = mysqli_num_rows($new_query_run);
		
		$new_query = "SELECT Titel, Thread_id FROM Posts WHERE Cat_id=" . $query_result['ID'] . " ORDER BY Time DESC LIMIT 0,1";
		$new_query_run = $connect->query($new_query);
		$new_query_result = mysqli_fetch_assoc($new_query_run);
	
		echo '<div class="categorie"><a href="category.php?id=' . $query_result['ID'] .'">';
		echo $query_result['Namn']; 
		echo '</a>';
		echo '<span class="cat_span" id="lastpost"><a href="posts.php?thr=' . $new_query_result['Thread_id'] . '">' . $new_query_result['Titel'] . '</a></span>';
		echo '<span class="cat_span" id="threads">' . $num_rows_threads . '</span>';
		echo '<span class="cat_span" id="posts">' . $num_rows_posts . '</span>';
		echo '</div>';

	}
	echo '<div class="categorie" id="group">Kost</div>';
	
	$query = "SELECT * FROM Categories WHERE Categorie_group=1";
	$query_run = $connect->query($query);
	while ($query_result = mysqli_fetch_assoc($query_run)) {

		$new_query = "SELECT * FROM Threads WHERE Categorie_id=" . $query_result['ID'];
		$new_query_run = $connect->query($new_query);
		$num_rows_threads = mysqli_num_rows($new_query_run);
		
		$new_query = "SELECT * FROM Posts WHERE Cat_id=" . $query_result['ID'];
		$new_query_run = $connect->query($new_query);
		$num_rows_posts = mysqli_num_rows($new_query_run);
		
		$new_query = "SELECT Titel, Thread_id FROM Posts WHERE Cat_id=" . $query_result['ID'] . " ORDER BY Time DESC LIMIT 0,1";
		$new_query_run = $connect->query($new_query);
		$new_query_result = mysqli_fetch_assoc($new_query_run);
	
		echo '<div class="categorie"><a href="category.php?id=' . $query_result['ID'] .'">';
		echo $query_result['Namn']; 
		echo '</a>';
		echo '<span class="cat_span" id="lastpost"><a href="posts.php?thr=' . $new_query_result['Thread_id'] . '">' . $new_query_result['Titel'] . '</a></span>';
		echo '<span class="cat_span" id="threads">' . $num_rows_threads . '</span>';
		echo '<span class="cat_span" id="posts">' . $num_rows_posts . '</span>';
		echo '</div>';

	}
	echo '<div class="categorie" id="group">Cyckling</div>';
	
	$query = "SELECT * FROM Categories WHERE Categorie_group=2";
	$query_run = $connect->query($query);
	while ($query_result = mysqli_fetch_assoc($query_run)) {

		$new_query = "SELECT * FROM Threads WHERE Categorie_id=" . $query_result['ID'];
		$new_query_run = $connect->query($new_query);
		$num_rows_threads = mysqli_num_rows($new_query_run);
		
		$new_query = "SELECT * FROM Posts WHERE Cat_id=" . $query_result['ID'];
		$new_query_run = $connect->query($new_query);
		$num_rows_posts = mysqli_num_rows($new_query_run);
		
		$new_query = "SELECT Titel, Thread_id FROM Posts WHERE Cat_id=" . $query_result['ID'] . " ORDER BY Time DESC LIMIT 0,1";
		$new_query_run = $connect->query($new_query);
		$new_query_result = mysqli_fetch_assoc($new_query_run);
	
		echo '<div class="categorie"><a href="category.php?id=' . $query_result['ID'] .'">';
		echo $query_result['Namn']; 
		echo '</a>';
		echo '<span class="cat_span" id="lastpost"><a href="posts.php?thr=' . $new_query_result['Thread_id'] . '">' . $new_query_result['Titel'] . '</a></span>';
		echo '<span class="cat_span" id="threads">' . $num_rows_threads . '</span>';
		echo '<span class="cat_span" id="posts">' . $num_rows_posts . '</span>';
		echo '</div>';

	}
	
	closeconnection($connect);
}

function display_threads() {
	
	$connect = connecttodatabase();
	$cat_id = $_GET['id'];
	
	$query = "SELECT Subject, ID, User_id FROM Threads WHERE Categorie_id='" . $cat_id . "' ORDER BY Time ASC";
	$query_run = $connect->query($query);
	if ($query_run) {
		while ($query_result = mysqli_fetch_assoc($query_run)) {
			$new_query = "SELECT Nickname FROM Anvandare WHERE ID=" . $query_result['User_id'];
			$new_query_run = $connect->query($new_query);
			$nickname = mysqli_fetch_assoc($new_query_run);
			if ($nickname['Nickname'] == null) {
			    $nickname['Nickname'] = $new_query;
			}
			
			$new_query = "SELECT ID FROM Posts WHERE Thread_id=" . $query_result['ID'];
			$new_query_run = $connect->query($new_query);
			$query_rows = mysqli_num_rows($new_query_run);
			
			$new_query = "SELECT Titel FROM Posts WHERE Thread_id=" . $query_result['ID'] . " ORDER BY Time DESC LIMIT 0,1";
			$new_query_run = $connect->query($new_query);
			$new_query_result = mysqli_fetch_assoc($new_query_run);
			
			echo '<div class="categorie"><a class="thr_subj" href="posts.php?thr=' . $query_result['ID'] . '">' . $query_result['Subject'] . '</a>';
			echo '<a class="thr_span" id="thr_user" href="#">' . $nickname['Nickname'] . '</a>';
			echo '<span class="thr_span">' . $query_rows . '</span>';
			echo '<a class="thr_span" id="lastpost" href="posts.php?thr=' . $query_result['ID'] . '">' . $new_query_result['Titel'] . '</a>';
			
			echo '</div>';
		}
	}
	else {
		echo "<div class='categorie'>Det finns inga ämnen i denna kategori</div>";
	}
	
	closeconnection($connect);
}

function display_post() {

	$connect = connecttodatabase();
	
	$thr_id = $_GET['thr'];
	
	
	$query = "SELECT Posts.Text AS Text, Posts.User_id AS User, Posts.ID AS ID, Anvandare.Nickname AS Nick FROM Posts INNER JOIN Anvandare ON Anvandare.ID=Posts.User_id WHERE Posts.Thread_id=" . $thr_id . " ORDER BY Time ASC";
	$query_run = $connect->query($query);
	$user_lvl = null;
	if ($_COOKIE['login']) {
		$secondquery = "SELECT User_lvl FROM Anvandare WHERE ID='" . $_COOKIE['login'] . "'";
		$secondquery_run = $connect->query($secondquery);
		$secondquery_result = mysqli_fetch_assoc($secondquery_run);
		if ($secondquery_result) {
			$user_lvl = $secondquery_result['User_lvl'];
		}
	}
	$first = True;
	
	if ($query_run) {
		while ($query_result = mysqli_fetch_assoc($query_run)) {
			if ($first) {
				if ($query_result['User'] == $_COOKIE['login'] || $user_lvl == "A") {
					echo '<div class="post" id="firstpost"><div class="postheader"><a class="creator" href="anvandare.php?nick=' . $query_result['Nick'] . '">' . $query_result['Nick'] . '</a><a class="edit" href="edit_post.php?id=' . $query_result['ID'] . '">Ändra</a><a class="edit" href="delete_post.php?id=' . $query_result['ID'] . '">Ta Bort</a></div>' . $query_result['Text'] . '</div>';
				} else {
					echo '<div class="post" id="firstpost"><div class="postheader"></div>' . $query_result['Text'] . '</div>';
				}
				$first = False;
			}
			else {
				if ($query_result['User'] == $_COOKIE['login'] || $user_lvl == "A") {
					echo '<div class="post"><div class="postheader"><a class="creator" href="anvandare.php?nick=' . $query_result['Nick'] . '">' . $query_result['Nick'] . '</a><a class="edit" href="edit_post.php?id=' . $query_result['ID'] . '">Ändra</a><a class="edit" href="delete_post.php?id=' . $query_result['ID'] . '">Ta Bort</a></div>' . $query_result['Text'] . '</div>';
				}
				else {
					echo '<div class="post"><div class="postheader"></div>' . $query_result['Text'] . '</div>';
				}
			}
		}
	}
	else {
		echo "Det finns inga poster";
	}
	
	echo mysql_error();
	closeconnection($connect);
}

function validatethread() {

	$connect = connecttodatabase();

	if (isset($_POST['subj']) && $_POST['subj'] != null) {
		if (isset($_POST['text']) && $_POST['text'] != null) {
			
			$time = date('Y', time()) . '/' . date('m', time()) . '/' . date('d', time()) . ' ' . date('H', time()) . ':' . date('i', time()) . ':' . date('s', time());
			$user = $_COOKIE['login'];
			$cat_id = $_COOKIE['cat_id'];
			$subject = $_POST['subj'];
			$text = $_POST['text'];
			
			$query = "INSERT INTO Threads (Subject, Time, User_id, Categorie_id) VALUES ('$subject', '$time','$user', '$cat_id')";
			$query_run = $connect->query($query);
			
			$query = "SELECT ID FROM Threads WHERE Subject='$subject' AND Time='$time'";
			$query_run = $connect->query($query);
			$query_result = mysqli_fetch_assoc($query_run);
			$thr_id = $query_result['ID'];
			
			$query = "INSERT INTO Posts (Cat_id, Thread_id, User_id, Text, Titel, Time) VALUES ('$cat_id', '$thr_id', '$user', '$text', '$subject', '$time')";
			if ($query_run = $connect->query($query)) {
				set_har_notis ($connect, $user, $thr_id, 2, 3);
				send_notis ($connect, $user ,$thr_id , 2, 3, "Du har precis skapat en tråd i forumet");
			} else {
				print "Error: 10, An error has occured while positng your thread";
			}
			
			echo mysql_error();
		
		}
		else {
			echo "Vänligen skriv en text för ditt inlägg";
		}
	}
	else {
		echo "fyll i ett ämne";
	}
	closeconnection($connect);
}

function validatepost() {
	
	$connect = connecttodatabase();
	
	if (isset($_POST['text']) && $_POST['text'] != null) {

		$text = $_POST['text'];
		$time = date('Y', time()) . '/' . date('m', time()) . '/' . date('d', time()) . ' ' . date('H', time()) . ':' . date('i', time()) . ':' . date('s', time());
		$thr_id = $_COOKIE['thr_id'];
		$user = $_COOKIE['login'];
		$cat_id = $_COOKIE['cat_id'];
		
		$query = "SELECT Subject FROM Threads WHERE ID=" . $thr_id;
		if ($query_run = $connect->query($query)) {
			
		} else {
			echo $query;
		}
		$query_result = mysqli_fetch_assoc($query_run);
		$titel = "RE: " . $query_result['Subject'];
		
		$query = "INSERT INTO Posts (Cat_id, Thread_id, User_id, Text, Titel, Time) VALUES ('$cat_id','$thr_id', '$user', '$text', '$titel', '$time')";
		if ($query_run = $connect->query($query)) {
			send_notis ($connect, $user, $thr_id , 2, 3, "Det har just skapats ett nytt inlägg i tråden");
		}
	}
	
	
	closeconnection($connect);

}

function get_edit_post () {

	$connect = connecttodatabase();
	
	$query = "SELECT Text FROM Posts WHERE ID=" . $_GET['id'];
	$query_run = $connect->query($query);
	$query_result = mysqli_fetch_assoc($query_run);
	
	echo '<form method="post" action="set_edit_post.php?id=' . $_GET['id'] . '"> Text: <textarea name="text" cols="25" rows="5">' . $query_result['Text'] . '</textarea> <input type="submit" value="Submit"> </form>';
	
	echo mysql_error();
	
	closeconnection($connect);
}

function edit_post () {
	$connect = connecttodatabase();
	
	$query = "UPDATE Posts SET Text='" . $_POST['text'] . "' WHERE ID='" . $_GET['id'] . "'";
	$query_run = $connect->query($query);
	echo $query;
	echo mysql_error();
	closeconnection($connect);
}

function delete_post () {
	$connect = connecttodatabase();
	
	$query = "DELETE FROM Posts WHERE ID=" . $_GET['id'];
	$query_run = $connect->query($query);

	closeconnection($connect);
}

?>