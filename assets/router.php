<?php

// "The Simplest PHP Router" by Tania Rascia
// https://www.taniarascia.com/the-simplest-php-router/

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '' :
	case '/' :
		if(!isset($_SESSION['steamid'])) {
			require './views/about.php';
		} else {
			require './views/home.php';
		}
		break;
    default:
        http_response_code(404);
        require './views/404.php';
        break;
}
