<!DOCTYPE html>
<?php
	include "../mysql/Forum/mysql_forum.php";
	checklogin_kalender();
?>
<head>
	<title>Löparkollektivet</title>
	<link rel="StyleSheet" href="../CSS/common/style.css" type="text/css">
	<link rel="StyleSheet" href="../CSS/Forum/style-forum.css" type="text/css">
	<link rel="StyleSheet" href="../CSS/common/menu-style.css" type="text/css">
	<?php head_setup () ;?>
	<script src="JS/Common.js"></script>
</head>


<body>
	<?php create_notis_center(); ?>
	<?php create_login_screen(); ?>
	<div class="main">
		<div class="top">
			<a class="tracker" href="index.php">Hem</a><span class="tracker">></span>
			<a class="tracker" href="forum.php">Forum</a><span class="tracker">></span>
			<?php menubar(); ?>
		</div>
		
		<div class="contain">
			<div class="forum-container">
				<div class="forumheader">
					<span class="forumheadertext">Forumdel</span><span class="forumheadertext" id="two">Senaste Inlägg</span><span class="forumheadertext" id="three">Trådar</span><span class="forumheadertext" id="three">Inlägg</span>
				</div>
				<?php display_categories(); ?>
			</div>
			
		</div>
		
		<?php create_footer(); ?>
		
	</div>
	
</body>
		