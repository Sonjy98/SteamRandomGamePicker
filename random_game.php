<?php
// random_game.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['STEAM_API_KEY'];
$steamId = $_ENV['STEAM_ID'];

// Build the URL to Steam's "GetOwnedGames" endpoint
// Documentation: https://developer.valvesoftware.com/wiki/Steam_Web_API#IPlayerService
$apiUrl = "http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=$apiKey&steamid=$steamId&include_appinfo=true&format=json";


// Fetch the data (using file_get_contents is a quick hack—cURL is more robust in production)
$json = file_get_contents($apiUrl);
$data = json_decode($json, true);

// Extract the games array
$games = $data['response']['games'] ?? [];

// Randomly choose one game
$randomGame = null;
if (!empty($games)) {
    $randomGame = $games[array_rand($games)];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
    'success' => ($randomGame !== null),
    'random_game' => $randomGame
]);
