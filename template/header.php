<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Ben's Steam Home Page</title>
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
				<div class="menu">
					<a id="logo" href="https://store.steampowered.com/">
						<img src="assets/steam_globalheader_logo.png" />
					</a>
					<?php
						if(!isset($_SESSION['steamid'])) {
							loginbutton(); //login button
						} else {
							include ('steamauth/userInfo.php'); //To access the $steamprofile array
							//Logout Button
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