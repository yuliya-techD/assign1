<?php 
session_start();
require "index1.php";
?>
<DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="main.css">           
            <link rel="stylesheet" href="tabs.css">
        </head>
        <body>
            <div>
                <div>
                <a href="index.php" style = "float : left;">PSAPP</a> 
                </div>
                <div style="width:70%;margin-bottom:50px; float:right;text-align: right;">
                    <a href="physician.php"> physician </a>
                    <a href="index.php">log out</a><br>
                </div>
            </div>


            <div class = "profile-menu">
                <ul>
                    <li class = "tablinks"onclick="openTab(event, 'patients')" >Patients data</li>
                    <li class = "tablinks"onclick="openTab(event, 'profile')" >Profile</li>
                </ul>
            </div>

            <div id = "patients" class="tabcontent"style = "display:block">
                <?php
                include "patientsData.php";
                ?>
            </div> 
            <div id = "profile" class="tabcontent first">
                <?php

                require_once "configGoogle.php";

                $mysql_user = "SELECT `user`.`email` FROM `user` WHERE Role_IDrole = 2";
                $aUsers = $mysqli -> query($mysql_user);
                authUsers($aUsers);

                $code = isset($_GET['code']) ? $_GET['code'] : NULL;


                if(isset($code)) {
                    echo "<pre>";
                    echo "code is : ".  $code ;
                    try {

                        $token = $client->fetchAccessTokenWithAuthCode($code);
                        echo "token is : ".  $token ;
                        if(!isset($token['error']))
                        {
                            $client->setAccessToken($token['access_token']);
                            $_SESSION['access_token'] = $token['access_token'];
                            $google_service = new Google_Service_Oauth2($google_client);
                            $data = $google_service->userinfo->get();
                        }

                        //$client->setAccessToken($code);
                        //$user_info = $client->verifyIdToken();
                    }catch (Exception $e){
                        echo "<pre>";
                        echo $e->getMessage();
                        echo "<br>";
                    }


                }
                ?>
            </div>

            <script>
                function openTab(evt, x) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(x).style.display = "block";
                    evt.currentTarget.className += " active";
                }

            </script>

        </body>
    </html>
</DOCTYPE>

