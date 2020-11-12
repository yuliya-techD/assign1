<?php 
session_start();

// Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Discord
$client_id = '774704408571150376';
$client_secret = 'gQJqxsXLhHvAyo8NuH4LgIqmgLTn6TOc';
$scope = 'email';
$redirect_url = 'http://localhost:80/site/patient.php';

//Setting the base url for API requests
$GLOBALS['base_url'] = "https://discord.com";
$tokenURL = 'https://discord.com/api/oauth2/token';

function authURL_D()
{
    $client_id = '774704408571150376';
    $redirect_url = 'http://localhost:80/site/patient.php'; 
    $scope = 'email';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        //creates the URL to discord autentication page 
        $disUrl = 'https://discordapp.com/oauth2/authorize?response_type=code&client_id=' . $client_id . '&redirect_uri=' . $redirect_url . '&scope=' . $scope;

        header("location: $disUrl");

    }
}

function fetchData(){
    $client_id = '774704408571150376';
    $client_secret = 'gQJqxsXLhHvAyo8NuH4LgIqmgLTn6TOc';
    $redirect_url = 'http://localhost:80/site/patient.php'; 
    $code = $_GET['code'];
    echo "<pre>";
    echo $code."\n";
    $post = http_build_query(array(           
        'client_id' => $client_id,
        'redirect_url' => $redirect_url ,
        'client_secret' => $client_secret,
        'code' => $code,          
    ));
    echo $post."\n";

   
        echo "hi";
        //$access_token_post = file_get_contents("https://github.com/login/oauth/access_token?".$post);
        $access_token_post = 'https://discordapp.com/api/oauth2/authorize' . '?' .$post;
        
        echo $access_toke_post."\n";

        file_get_contents("data/data1.csv");

}






?>