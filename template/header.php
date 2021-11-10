<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Steam Notes</title>
	<script src="https://unpkg.com/vue"></script>
	<link rel="shortcut icon" type="image/png" href="assets/favicon.png"/>
	<link rel="stylesheet" href="assets/style.css">
	<?php 

	// Check Session for Steam ID, pass to JS
	$steamID = !isset($_SESSION['steamid']) ? "null" : $_SESSION['steamid'];
	echo "<script type=\"application/javascript\">var steam_user_id = " . $steamID . ";</script>";
	
	// Check DB for user Steam ID
	$user_data = DB::run("SELECT data FROM users WHERE steamid=?", [$steamID])->fetchColumn();
	if($user_data){
		echo "<script type=\"application/javascript\">var user_data = $user_data;</script>";
	}
	
	?>
</head>

<body>
	<div id="app">

		<section id="header">
			<div class="container">

				<a class="brand" href="/" target="_self">
					<img class="logo" src="assets/logo_steam-notes.svg" alt="Steam Notes Logo"/>
					<h1 class="site-title">Steam Notes</h1>
				</a>

				<div class="menu">
					<a id="logo" href="https://store.steampowered.com/">
						<img src="assets/steam_globalheader_logo.png" />
					</a>
					<?php
						if(!isset($_SESSION['steamid'])) {
							loginbutton(); // Login Button
						} else {
							include ('steamauth/userInfo.php'); // To access the $steamprofile array
							// Add Games Button
							echo '<button id="modal-open">Open</button>';
							// Logout Button
							logoutbutton(); 
							// Profile Avatar
							echo	'<a href="' . $_SESSION['steam_profileurl'] . '" class="user_avatar playerAvatar ">
										<img src="' . $_SESSION['steam_avatar'] . '">
									</a>';
						}     
						?>
					<!-- <a href="https://google.com/">Google</a> -->
				</div>
			</div>
		</section>