<?php
	include "../mysql/Forum/mysql_forum.php";
	$id = $_GET['id'];
	setcookie("cat_id", $id, (time()+60*60*24*30));
?>
<!DOCTYPE html>

<head>
	<title>Löparkollektivet</title>
	<link rel="StyleSheet" href="../CSS/common/style.css" type="text/css">
	<link rel="StyleSheet" href="../CSS/Forum/style-forum.css" type="text/css">
	<link rel="StyleSheet" href="../CSS/common/menu-style.css" type="text/css">
	<?php head_setup () ;?>
	<script src="../JS/Common.js"></script>
</head>


<body>
	<?php create_notis_center(); ?>
	<?php create_login_screen(); ?>

	<div class="main">
		<div class="top">
			<a class="tracker" href="index.php">Hem</a><span class="tracker">></span>
			<a class="tracker" href="forum.php">Forum</a><span class="tracker">></span>
			<?php
				menubar();
			?>
		</div>

		<a href="forum.php" class="top_link" id="active">Forum</a>
		<a href="sok_forum.php" class="top_link">Sök</a>
		<a href="#" class="top_link">Mina Trådar</a>
		<a href="#" class="top_link">Senaste</a>
		<a href="#" class="top_link">Följda Trådar</a>

		<div class="contain">
			<div class="forum-container">
				<div class="forumheader">
					<span class="forumheadertext">Ämne</span><span class="forumheadertext" id="two">Skapare</span><span class="forumheadertext" id="three">Antal svar</span><span class="forumheadertext" id="three">Senaste Svar</span>
				</div>
				<?php
					display_threads();
				?>
			</div>
			<button class="form-submit-button" id="kategori" onclick="window.location.assign('skapa_thread.php')">Ny Tråd</button>
		</div>
		<?php ads_bar_setup();?>
		<?php create_footer(); ?>

	</div>

</body>