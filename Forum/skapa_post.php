<!DOCTYPE html>
<?php
	include "../mysql/Forum/mysql_forum.php";
?>
<head>
	<title>Löparkollektivet</title>
	<link rel="StyleSheet" href="../CSS/common/style.css" type="text/css">
	<link rel="StyleSheet" href="../CSS/Forum/style-forum.css" type="text/css">
	<link rel="StyleSheet" href="../CSS/common/menu-style.css" type="text/css">

	<?php head_setup () ;?>
	<script src="http://localhost/~marcushanikat/GitHub/Lopar-UI/JS/forum.js"></script>
	<script src="../JS/Common.js"></script>

</head>


<body>
	<?php create_notis_center(); ?>
	<?php create_login_screen(); ?>
	<div class="main">
		<div class="top">
			<?php menubar(); ?>
		</div>

		<a href="forum.php" class="top_link" id="active">Forum</a>
		<a href="sok_forum.php" class="top_link">Sök</a>
		<a href="#" class="top_link">Mina Trådar</a>
		<a href="#" class="top_link">Senaste</a>
		<a href="#" class="top_link">Följda Trådar</a>
		<div class="contain" >
			<div class="create-post-tools-container">
				<button class="forum-create-post-icon" id="bold" onclick="bold(this.id);"></button>
				<button class="forum-create-post-icon" id="italic" onclick="bold(this.id);"></button>
				<button class="forum-create-post-icon" id="underlined" onclick="bold(this.id);"></button>

				<button class="forum-create-post-icon" id="left" onclick="bold(this.id);"></button>
				<button class="forum-create-post-icon" id="center" onclick="bold(this.id);"></button>
				<button class="forum-create-post-icon" id="right" onclick="bold(this.id);"></button>

				<button class="forum-create-post-icon" id="link" onclick="bold(this.id);"></button>
				<button class="forum-create-post-icon" id="image" onclick="bold(this.id);"></button>

				<button class="forum-create-post-icon" id="paragraph" onclick="bold(this.id);"></button>
				<button class="forum-create-post-icon" id="list" onclick="bold(this.id);"></button>
			</div>
				<form method="post" action="submit_post.php">
					<textarea class="create-post form-text-input"></textarea>
					<br><input class="form-submit-button create-post" type="submit" value="Submit">
				</form>
		</div>
		<?php ads_bar_setup();?>
		<?php create_footer(); ?>
	</div>
</body>