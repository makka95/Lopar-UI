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
		
		<a href="anvandare.php" class="top_link" id="active">Användar Data</a>
		<a href="anvandare_friends.php" class="top_link">Vänner</a>
		<a href="#" class="top_link">Inställningar</a>
		<div class="contain">
				<?php
					get_profil();
				?>
		</div>
		<?php create_footer(); ?>
	</div>
	
</body>
