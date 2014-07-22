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
				get_news();
			?>
		</div>

		<div class="forum_news">
			<span class="nyhet_forum">
				Nyheter I Forumet
			</span>
			<ul class="forum_news">
				<li>
					<a href="#" >mmmmmmmmmmmmmmmmmmmmmmmmm</a>
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
		<div class="aktiviteter_news">
			<span class="nyhet_forum">
				Senaste aktiviteterna
			</span>
			<ul class="forum_news">
			<li>
					<a href="#" >Löpning</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Gymning</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Jogging</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Promenad</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Innebandy</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Cyckling</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Simmning</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Fotboll</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Ishockey</a>
					<a href="#" class="checked">30</a>
				</li>
				<li>
					<a href="#" >Boxning</a>
					<a href="#" class="checked">30</a>
				</li>
			</ul>
		</div>
		<div class="ads">
			<img src="http://placehold.it/308x272/ffffff/000000&text=Ads goes here!" alt="placeholder">
		</div>
		
		<?php create_footer(); ?>
		
		</div>
</body>
</html>
