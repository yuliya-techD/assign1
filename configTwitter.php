<?php 
require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY','JAht505IeJdOR8KZ3O01DAVYb');
define('CONSUMER_SECRET','TjPrFkHhNs1u0zmE47nmkxvseO0WUB160Rj39qdQYAZu3Vb6zZ');
// your app callback url
define( 'OAUTH_CALLBACK', 'http://localhost:80/site/patient.php' );
$access_token = '1317160137501585408-YmQIUCB9F5eUFO3J4CyejuwowvctVz';
$access_token_secret = 'Y5x7B11hAziDc2hwNTLUxWqNOEcFIzQTPe2MsyoeI63Yi';

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
//$content = $connection->get("account/verify_credentials");

echo "<pre>";
print_r($connection);

?>