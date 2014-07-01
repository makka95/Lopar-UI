<!DOCTYPE html>
<?php
	session_start();
	include "mysql/mysql.php";
	include "mysql/mysql_news.php";
?>

<html>
<head>
	<title>Löparkollektivet</title>
	<link rel="StyleSheet" href="CSS/common/style.css" type="text/css">
	<link rel="StyleSheet" href="CSS/common/menu-style.css" type="text/css">
	<link rel="StyleSheet" href="CSS/index/news-style.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:700&subset=latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>

	<script src="http://code.jquery.com/jquery-2.1.0.js"></script>
	<script src="JS/jquery-cookie-master/jquery.cookie.js"></script>
	<script src="JS/index/notis.js"></script>


</head>


<body>
	<div class="background">
	</div>

	<?php create_notis_center(); ?>

	<div class="loggain">
		<div class="loginform">
			<span class="login_text">Logga in</span><br>
			<form action="login.php" method="post" class="login">
				<span class="login">Användarnamn:</span><br>
				<input type="text" name="user"><br><br>
				<span class="login">Lösenord:</span><br>
				<input type="password" name="pass"><br>
				<input type="submit" value="Login">

			</form><br><br>
			<hr class="login"><br>
			<a href="#" class="forgot_pass">Glömt Lösenordet?</a><br>
			<a href="#" class="forgot_user">Glömt Användarnamn?</a><br>
			<a href="#" class="reg">Registrera dig här</a>
		</div>
		<button class="fadeout" onclick="fade_login()">X</button>
	</div>
	<div class="main">
		<div class="top">
			<a class="tracker" href="index.php">Hem</a><span class="tracker">></span>
			<?php menubar(); ?>
		</div>

		<a href="index.php" class="top_link" id="active">Nyheter</a>
		<a href="sok_nyhet.php" class="top_link">Sök</a>
		<a href="arkiv_nyhet.php" class="top_link">Arkiv</a>

		<div class="contain">
			<?php
				get_news();
			?>
		</div>

		<div class="forum_news">
			<span class="nyhet_forum">
				Nyheter I Forumet
			</span>
			<ul class="forum_news">
				<li>
					<a href="#" >Detta är ett test</a>
					<a href="#" class="responses">30</a>
				</li>
				<li>
					<a href="#" >Detta är en länk</a>
					<a href="#" class="responses">30</a>
				</li>
				<li>
					<a href="#" >Detta är en konstig grej</a>
					<a href="#" class="responses">30</a>
				</li>
				<li>
					<a href="#" >Detta är en hink</a>
					<a href="#" class="responses">30</a>
				</li>
				<li>
					<a href="#" >Detta är ett skämt</a>
					<a href="#" class="responses">30</a>
				</li>
			</ul>
		</div>

		<div class="footer">
		</div>
	</div>
	

</body>
</html>
