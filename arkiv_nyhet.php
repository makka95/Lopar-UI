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
	<script>
		function load_site() {
			$('ul.year li').on("click", function () {
				if ($('ul#' + $(this).html()).is(":visible")) {
					$('ul#' + $(this).html()).hide();
					$('ul#' + $(this).html() + ' li').off('click');
				} else {
					$('ul#' + $(this).html()).show();
					$('ul#' + $(this).html() + ' a').css("display", "none");
					var year = $(this).html();
					$('ul#' + $(this).html() + ' li').on('click', function () {
						if ($('a#' + year + '.' + $(this).html()).is(":visible")) {
							$('a#' + year + '.' + $(this).html()).hide();
						} else {
							$('a#' + year + '.' + $(this).html()).show();
						}
					});
				}
			});
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
		<a href="sok_nyhet.php" class="top_link">Sök</a>
		<a href="arkiv_nyhet.php" class="top_link" id="active">Arkiv</a>

		<div class="contain">
			<div class="arkiv_contain">
				<br>Nyheter sorterade efter år och månader:<br>
				<?php
					get_arkiv_news();
				?>
			</div>
		</div>

		<div class="ads no-margin-top">
			<img src="http://placehold.it/308x272/ffffff/000000&text=Ads goes here!" alt="placeholder">
		</div>

		<?php create_footer(); ?>

	</div>

</body>
</html>
