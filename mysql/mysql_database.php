<?phpini_set("auto_detect_line_endings", true);ob_start();error_reporting(E_WARNING);ini_set("default_charset", 'utf-8');date_default_timezone_set('Europe/Stockholm');session_start();function connecttodatabase() {  $con = mysqli_connect("mysql443.loopia.se", "admin@l83291", "skrotan1995", "loparkollektivet_se");	if (mysqli_connect_errno($con)) {		echo "Failed to connect to MySQL: " . mysqli_connect_error();	}  return $con;}function closeconnection($con) {	if(!mysqli_close($con)){		echo mysqli_error($con);	}}function checklogin_kalender () {}function checklogin () {	if (array_key_exists('login', $_COOKIE)) {		return true;	} else {		return false;	}}function login() {	$connection = connecttodatabase();	$pass = "";	$user = "";	$query = "";	if (isset($_POST['user']) && $_POST['user'] != null) {		$user = $_POST['user'];		if (isset($_POST['pass']) && $_POST['pass'] != null) {			$pass = md5($_POST['pass']);			$query = "SELECT ID FROM Anvandare WHERE Nickname='$user' AND Password ='$pass'";		}	}	if ($query != "") {		$id = $connection->query($query);		$id = mysqli_fetch_assoc($id);		$id = $id['ID'];		$_SESSION['Loggedin'] = $id;	}	closeconnection($connection);}function menubar() {	print '<a href="index.php" class="logo">Träningskollektivet</a>';	tracker();	if (checklogin()) {		$connect = connecttodatabase();		$id = $_COOKIE['login'];		$nickname = mysqli_fetch_assoc($connect->query("SELECT Nickname FROM Anvandare WHERE ID=" . $id));		$nickname = $nickname['Nickname'];		print '<div class="inlogg">';		print '<a href="anvandare.php">' . $nickname . '</a>';		print '<a href="mysql/login/logout.php">Logga Ut</a>';		print '</div>';		closeconnection($connect);	} else {		print '<div class="inlogg">';		print '<button class="inlogg">Logga In</button>';		print '<a href="skapa_anvandare.php">Skapa Konto</a>';		print '</div>';	}	/*		menyitems = [["Hem", "index.php"]]		active = "Hem"		ul		foreach (item in menyitems)  {			print '<li id="hem"><a';			if (aktiv) {				print 'class="active" '			}			print 'href="index.php">Hem</a></li>';		}		/ul	*/	print '<ul class="menu">';	print '<li id="annat"><a href="#">Annat</a></li>';	print '<li id="blogg"><a href="blogg.php">Blogg</a></li>';	print '<li id="kalender"><a href="kalender.php">Kalender</a></li>';	print '<li id="forum"><a href="Forum/forum.php">Forum</a></li>';	print '<li id="hem"><a class="active" href="index.php">Hem</a></li>';	print '</ul>';}function tracker() {	$pagename = basename($_SERVER['PHP_SELF']);	if ($pagename == "category.php") {		$connect = connecttodatabase();		$id = $_GET['id'];		$query = "SELECT Namn FROM Categories WHERE ID='" . $id . "'";		$query_run = $connect->query($query);		$query_result = mysqli_fetch_assoc($query_run);		print '<a class="tracker" href="' . $pagename . '?id=' . $id . '">' . mb_convert_encoding($query_result['Namn'], "UTF-8") . '</a><span class="tracker">></span>';		closeconnection($connect);	}	else if ($pagename == "posts.php") {		$connect = connecttodatabase();		$thr_id = $_GET['thr'];		$query = "SELECT Categorie_id FROM Threads WHERE ID='" . $thr_id . "'";		$query_run = $connect->query($query);		$query_result_cat_id = mysqli_fetch_assoc($query_run);		$query = "SELECT Namn FROM Categories WHERE ID='" . $query_result_cat_id['Categorie_id'] . "'";		$query_run = $connect->query($query);		$query_result_cat_namn = mysqli_fetch_assoc($query_run);		$query = "SELECT Subject FROM Threads WHERE ID='" . $thr_id . "'";		$query_run = $connect->query($query);		$query_result = mysqli_fetch_assoc($query_run);		print '<a class="tracker" href="category.php?id=' . $query_result_cat_id['Categorie_id'] . '">' . mb_convert_encoding($query_result_cat_namn['Namn'], "UTF-8") . '</a><span class="tracker">></span>';		print '<a class="tracker" href="posts.php?thr=' . $thr_id . '">' . mb_convert_encoding($query_result['Subject'], "UTF-8") . '</a><span class="tracker">></span>';		closeconnection($connect);	}	else if ($pagename == "news.php") {		$connect = connecttodatabase();		$news_id = $_GET['id'];		$query = "SELECT Subject FROM News WHERE ID='" . $news_id . "'";		$query_run = $connect->query($query);		$query_result = mysqli_fetch_assoc($query_run);		print '<a class="tracker" href="news.php?id=' . $news_id . '">' . mb_convert_encoding($query_result['Subject'], "UTF-8") . '</a><span class="tracker">></span>';		closeconnection($connect);	}	else if ($pagename == "anvandare.php") {		$connect = connecttodatabase();		$id = $_COOKIE['login'];		$query = "SELECT Nickname FROM Anvandare WHERE ID='" . $id . "'";		$query_run = $connect->query($query);		$query_result = mysqli_fetch_assoc($query_run);		print '<a class="tracker" href="anvandare.php">' . mb_convert_encoding($query_result['Nickname'], "UTF-8") . '</a><span class="tracker">></span>';		closeconnection($connect);	}}function get_month($month) {	$ret = "";	switch ($month) {		case 1:			$ret = "Januari";			break;		case 2:			$ret = "Februari";			break;		case 3:			$ret = "Mars";			break;		case 4:			$ret = "April";			break;		case 5:			$ret = "Maj";			break;		case 6:			$ret = "Juni";			break;		case 7:			$ret = "Juli";			break;		case 8:			$ret = "Augusti";			break;		case 9:			$ret = "September";			break;		case 10:			$ret = "Oktober";			break;		case 11:			$ret = "November";			break;		case 12:			$ret = "December";			break;	}	return $ret;}function create_login_screen ()  {	print '<div class="loggain">';		print '<div class="loginform">';			print '<span class="login_text">Logga in</span><br>';			print '<form action="mysql/Login/login.php" method="post" class="login">';				print '<input class="form-text-input" type="text" name="user" placeholder="Användarnamn"><br><br>';				print '<input class="form-text-input" type="password" name="pass" placeholder="Lösenord"><br>';				print '<input class="form-submit-button" type="submit" value="Login">';			print '</form><br><br>';			print '<hr class="login"><br>';			print '<a href="#" class="forgot_pass">Glömt Lösenordet?</a><br>';			print '<a href="#" class="forgot_user">Glömt Användarnamn?</a><br>';			print '<a href="#" class="reg">Registrera dig här</a>';		print '</div>';		print '<button class="fadeout" onclick="fade_login()">X</button>';	print '</div>';}function create_footer () {	print '<div class="footer">';			print '<a href="#" class="footer">Hem</a>';			print '<a href="#" class="footer">Site Map</a>';			print '<a href="#" class="footer">Information</a>';			print '<a href="#" class="footer">Kontakta Träningskollektivet</a>';			print '<a href="#" class="footer">Rapportera Fel</a><br>';			print '<center><span class="footer">Copyright © 2014 Träningskollektivet. Allt innehåll tillhör Träningskollektivet. <br>Citering är tillåten om källan anges i form av länk till webplatsen.</span></center>';		print '</div>';	print '</div>';}function head_setup () {	print '<link href="http://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet" type="text/css">';	print '<link href="http://fonts.googleapis.com/css?family=BenchNine:700&subset=latin-ext" rel="stylesheet" type="text/css">';	print '<link href="http://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet" type="text/css">';	print '<script src="http://code.jquery.com/jquery-2.1.0.js"></script>';	print '<script src="JS/jquery-cookie-master/jquery.cookie.js"></script>';}?>