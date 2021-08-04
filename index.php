<?php

require_once 'steamauth/steamauth.php';
// The Simplest PHP Router
// https://www.taniarascia.com/the-simplest-php-router/

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '' :
    case '/' :
        require __DIR__ . '/views/home.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}

?>

<!doctype html>

<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Ben's Steam Home Page</title>
	<script src="https://unpkg.com/vue"></script>
	<link rel="shortcut icon" type="image/png" href="assets/favicon.png"/>
	<link rel="stylesheet" href="assets/style.css">

</head>

<body>

	<section id="header">
			<div class="container">
				<div class="menu">
					<a id="logo" href="https://store.steampowered.com/">
						<img src="assets/steam_globalheader_logo.png" />
					</a>
					<a	href="https://google.com/">Google</a>
				</div>
			</div>
	</section>

	<section class="body">
		<div class="container">
			<div class="games"></div>
			<div id="app">
				{{ games }}
			</div>
		</div>
	</section>

	<script type="text/javascript" src="assets/script.js"></script>

</body>

</html>