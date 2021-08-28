<?php

require_once 'assets/config.php';
require_once 'assets/db.php';
require_once 'steamauth/steamauth.php';

// The Simplest PHP Router
// https://www.taniarascia.com/the-simplest-php-router/
// TODOs
// - Move router to its own file in assets
// - Add filtering to games list modal
// - Finish styling games list modal
// - Add MySQL save / retrieve functions
// - Give visual/text feedback on DB save
// - Add help view
// - Add tour (?)
// - Style buttons

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
