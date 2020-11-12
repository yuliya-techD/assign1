<?php 
session_start();
require_once 'google-api-php-client-v2/vendor/autoload.php';

// Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
$client_id = '266105336873-ets8t6resickrpkq7hgk9b4kvf875lrn.apps.googleusercontent.com';
$client_secret = 'Qux_-O23dQ9YTbdvPH7osOel';
$redirect_uri = 'http://localhost:80/site/physician.php';

//Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName("PSAPP");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope('email');
$client->addScope("https://www.googleapis.com/auth/plus.login");

//creates the URL to google autentication page 
$authUrl = $client->createAuthUrl();

?>