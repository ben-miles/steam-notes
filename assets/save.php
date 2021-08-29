<?php

session_start();
require 'config.php';
require 'db.php';

// If GET is empty, fuck right off
if(empty($_GET)){
	echo "Error: Uh uh uh, you didn't say the magic word!";
	exit;
}

// Get $_GET data
$data = $_GET["data"];
$steamID = $_SESSION["steamid"];

// Check DB for existing record
$userID = DB::run("SELECT id FROM users WHERE steamid=?", [$steamID])->fetchColumn();

// If user already exists, 
if( $userID ){

	// Update
	$stmt = DB::run("UPDATE users SET data=? WHERE id=?", [$data, $userID]);

} else {

	// Insert
	$stmt = DB::prepare("INSERT INTO users VALUES (0, ?, ?)");
	$stmt->execute([$steamID, $data]);
	var_dump(DB::lastInsertId());

}

// Return remote data to AJAX request

?>
