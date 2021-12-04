<?php

session_start();
require "config.php";

// If GET is empty, fuck right off
if(empty($_GET)){
  echo "Error: Uh uh uh, you didn't say the magic word!";
  exit;
}

// Get $_GET data
$endpoint = $_GET["endpoint"];
// $steam_user_id = $_GET["steam_user_id"];
$steam_user_id = $_SESSION["steamid"];

// Get API endpoint URI from $_POST data
$steam_domain = "https://api.steampowered.com/";
switch($endpoint){
  // Missing endpoint param
  case "":
    echo "Error: Missing endpoint param";
    exit;
    break;
  // User profile
  case "GetPlayerSummaries":
    $url = $steam_domain . "ISteamUser/GetPlayerSummaries/v0002/?key=" . $steam_api_key . "&steamids=" . $steam_user_id;
    break;
  // Achievements for 1 game
  case "GetUserStatsForGame":
    $url = $steam_domain . "ISteamUserStats/GetUserStatsForGame/v0002/?appid=275850&key=" . $steam_api_key . "&steamid=" . $steam_user_id;
    break;
  // All games owned by user (add `&include_appinfo=1` to include game names)
  case "GetOwnedGames":
    $url = $steam_domain . "IPlayerService/GetOwnedGames/v0001/?key=" . $steam_api_key . "&steamid=" . $steam_user_id . "&include_appinfo=1";
    break;
  // recently played (last 2 weeks) games
  case "GetRecentlyPlayedGames":
    $url = $steam_domain . "IPlayerService/GetRecentlyPlayedGames/v0001/?key=" . $steam_api_key . "&steamid=" . $steam_user_id;
    break;
}

// cURL
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
curl_setopt( $ch, CURLOPT_HEADER, true );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] );
list( $header, $contents ) = preg_split( '/([\r\n][\r\n])\\1/', curl_exec( $ch ), 2 );
$status = curl_getinfo( $ch );
curl_close( $ch );

// Split header text into an array.
$header_text = preg_split( '/[\r\n]+/', $header );
// Propagate headers to response.
foreach ( $header_text as $header ) {
  if ( preg_match( '/^(?:Content-Type|Content-Language|Set-Cookie):/i', $header ) ) {
    header( $header );
  }
}

// Return remote data to AJAX request
print $contents;

?>
