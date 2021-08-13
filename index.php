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
