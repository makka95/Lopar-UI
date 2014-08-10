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
		<a href="anvandare_friends.php" class="top_link" id="active">Vänner</a>
		<a href="anvandare_settings.php" class="top_link">Inställningar</a>
		<div class="contain">
			
			<div class="friends">
			
				<span class="friends">Vänner</span>
				<div class="friends_list">
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
					<div class="friend">
						<img alt="Profilbild" src="User-Prof/11-prof.jpg">
						<a class="friend_name" href="anvandare.php?nick=makka95">Makka95</a>
						<button class="remove_friend" onclick="alert('Vill du verkligen ta bort din vän?');">X</button>
					</div>
				</div>
			</div>
			
			<div class="sok_friends">
				<span class="friends">Sök Vänner</span>
				<form class="sok_friends" action="" method="POST">
					<input type="text" class="form-text-input" name="namn" placeholder="Sök Efter Vänner">
					<input type="submit" class="form-submit-button" value="Sök">
				</form>
			</div>
			<div class="friends_result">
				<span class="friends">Inga Användare Hittade</span>
			</div>
		</div>
		<?php create_footer(); ?>
	</div>
	
</body>
