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
					<ul class="nav">
						<?php if(isset($_SESSION['steamid'])) { ?>
						<li class="nav-item">
							<a href="/" target="_self">My Notes</a>
						</li>
						<?php } ?>
						<li class="nav-item">
							<a href="/about" target="_self">About</a>
						</li>
						<?php if(!isset($_SESSION['steamid'])) { ?>
						<li class="nav-item">
							<?php loginbutton(); ?> 
						</li>
						<?php } else { ?>
						<li class="nav-item">
							<a href="/logout" target="_self">Logout</a>
						</li>
						<?php } ?>
					</ul>
				</div>
				
				<?php
				if(isset($_SESSION['steamid'])) {
					// Get user's Steam Profile 
					include ('steamauth/userInfo.php');
					// Show Steam Profile info
					echo '<div class="user">
					<a href="' . $_SESSION['steam_profileurl'] . '" target="_blank" class="user_avatar playerAvatar">
					<img src="' . $_SESSION['steam_avatar'] . '">
					<span>' . $_SESSION['steam_personaname'] . '</span>
					</a>
					</div>';
				}
				?>
				
			</div>
		</section>