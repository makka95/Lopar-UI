<!DOCTYPE html>
<?php 
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
	<script src="JS/Small-calendar/small-calendar.js"></script>
	<script>
		function load_site() {
			setup_small_calendar();
		}
	</script>
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

		<a href="index.php" class="top_link">Nyheter</a>
		<a href="sok_nyhet.php" class="top_link" id="active">Sök</a>
		<a href="arkiv_nyhet.php" class="top_link">Arkiv</a>

		<div class="contain">
			<div class="sok">
				<p>Sök efter nyhetsartiklar:</p><br>
				<form action="sok_nyhet.php" method="post">
					Fras: <input type="text" name="fras"><br><br>
					Från: <input type="text" class="small_calendar" name="datumf"> 
					Till: <input type="text" class="small_calendar" name="datumt"><br><br>
					<input type="submit" value="Sök">
				</form>
			</div>
			<div class="sok_calendar">
				<p class="date"></p>
				<button class="sok_calendar" id="left"></button>
				<button class="sok_calendar" id="right"></button>
				
				<table class="sok_table">
					
				</table>
			</div>
			<?php
				sok_nyheter();
			?>
		</div>
		
		<div class="ads">
			<img src="http://placehold.it/308x272/ffffff/000000&text=Ads goes here!" alt="placeholder">
		</div>
		
		<?php create_footer(); ?>
		
	</div>

</body>
</html>
