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
	<?php head_setup () ;?>
	<script src="JS/Common.js"></script>
	
	
</head>


<body>
	<?php create_notis_center(); ?>
	<?php create_login_screen(); ?>
	
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
				display_news();
			?>
		</div>
		
		<div class="ads no-margin-top">
			<img src="http://placehold.it/308x272/ffffff/000000&text=Ads goes here!" alt="placeholder">
		</div>
		
		<?php create_footer(); ?>
	</div>
</body>
</html>