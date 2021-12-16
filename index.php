<?php

// FOR DEBUGGING:
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require 'assets/config.php';
require 'assets/db.php';
require 'steamauth/steamauth.php';
require 'assets/router.php';

// TODOs
// - Style Confirm Unpin
// - Add Google button (shortcut to Google search for game title)
// - Give visual/text feedback on DB save
// - If not signed in 
// - - Get fill list of games from Steam
// - - Save to localstorage
// - Add Dark Mode toggle
// - Add Markdown support
// - Add drag-and-drop sort for pinned games

// CHANGELOG
// - v1 - 2021/12/07 - Finalized all essential functionality, text and graphics assets, and published online at steamnotes.dev

?>
