<!DOCTYPE html>
<?php
		include "mysql/mysql.php";
?>
<head>
	<title>Löparkollektivet</title>
	<link rel="StyleSheet" href="CSS/common/style.css" type="text/css">
	<link rel="StyleSheet" href="CSS/common/menu-style.css" type="text/css">
	<link rel="StyleSheet" href="CSS/User/user-style.css" type="text/css">
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
		
		<a href="anvandare.php" class="top_link">Användar Data</a>
		<a href="anvandare_friends.php" class="top_link">Vänner</a>
		<a href="anvandare_settings.php" class="top_link" id="active">Inställningar</a>
		<div class="contain">
			<form class="change-password" action="#" method="POST">
				<span class="change-password">Byt Lösenord:</span><br>
				<span class="change-password-hint">Skriv in ditt gamla lösenord:</span><br>
				<input class="form-text-input" type="password" name="gamla" placeholder="Gamla lösenordet"><br>
				<span class="change-password-hint">Skriv in ditt nya lösenord:</span><br>
				<input class="form-text-input" type="password" name="nya" placeholder="Nytt Lösenord"><br>
				<span class="change-password-hint">Skriv in ditt nya lösenord igen:</span><br>
				<input class="form-text-input" type="password" name="nya-uppr" placeholder="Upprepa Lösenordet"><br>
				<input class="form-submit-button" type="submit" value="Byt Lösenord">
			</form>
		</div>
		<?php create_footer(); ?>
	</div>
	
</body>