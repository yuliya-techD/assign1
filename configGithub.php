<?php

function authURL()
{
    $client_id = 'cb563c01dc380e4608c2';
    $redirect_url = 'http://localhost:80/site/researcher.php'; 

    
        $auth_url1 = 'https://github.com/login/oauth/authorize?client_id='.$client_id.'&redirect_url='.$redirect_url.'&scope=user';
    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $auth_url = 'https://github.com/login/oauth/authorize?client_id='.$client_id.'&redirect_url='.$redirect_url.'&scope=user';

        header("location: $auth_url");

    }
}

function fetchUserData(){
    $client_id = 'cb563c01dc380e4608c2';
    $client_secret = 'a2bcf1b246b0a328fce497671cd4dedecc7ea991';
    $redirect_url = 'http://localhost:80/site/researcher.php'; 
    $code = $_GET['code'];
    echo $code;
    $post = http_build_query(array(           
        'client_id' => $client_id,
        'redirect_url' => $redirect_url ,
        'client_secret' => $client_secret,
        'code' => $code,          
    ));
    $access_token_post = file_get_contents("https://github.com/login/oauth/access_token?".$post);
    $sth = explode('access_token=',$access_token_post);
    $user_scope = explode('&scope=user',$sth[1]);
    $access_token = $user_scope[0];

    echo "<pre>";
    var_dump($user_scope);
    echo "<br>";
    $options = [
        'http' => [
            'method' => 'GET',
            'header' => ['User-Agent: PSAPP']                    
        ]      
    ];
    var_dump($options);
    $context = stream_context_create($options);
    var_dump($context);
    echo "<br>";
    $url= "https://api.github.com/user?access_token=$access_token";
    var_dump($url);echo "<br>";
    $data = file_get_contents($url,false,$context); 
    $user = json_decode($data,true);
    $username = $user['login'];
    var_dump($username); echo "<br>";
    echo get_resource_type($context) . "\n";

    /*  
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['code']){
            $code = $_GET['code'];
            var_dump($code);
                       $post = http_build_query(array(           
                'client_id' => $client_id,
                'redirect_url' => $redirect_url ,
                'client_secret' => $client_secret,
                'code' => $code,          
            ));

            $access_token_post = file_get_contents("https://github.com/login/oauth/access_token?".$post);

            $sth = explode('access_token=',$access_token_post);
            $user_scope = explode('&scope=user',$sth[1]);
            $access_token = $user_scope[0];

            $options = [
                'http' => [
                    'method' => 'GET',
                    'header' => ['User-Agent: PHP']                    
                ]      
            ];

            $context = stream_context_create($options);

            $url = "https://api.github.com/user?access_token=$access_token";
            $data_content = file_get_contents($url,false,$context);
            $user_data = json_decode($data_content,true);
            $username = $user_data['login'];// login data 

            $url_email = "https://api.github.com/user/emails?access_token=$access_token";
            $data_emails = file_get_contents($url_email,false,$context); 
            $user_emails = json_decode($data_emails,true);
            $user_email = $user_data[0];//the email


            $userInfo = [
                'username'  => $username,
                'email' => $user_email,
                'fetched from' => "github"
            ];

            $_SESSION['userinfo'] = $userInfo;
            $_SESSION['user'] = $username;

            return $userInfo;
        } else{
            die('error');
        }
*/
}

?>