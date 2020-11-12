<?php
require_once "index1.php";
require "configGithub.php";

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
            <a href="index.php">PSAPP</a> 
            <a href="researcher.php">researcher1</a>
            <a href="ghLogout.php">log out</a>
            <div>
                <div class = "profile-menu">
                    <ul>
                        <li class = "tablinks" onclick="openTab(event, 'news')" >Latest news</li>
                        <li class = "tablinks"onclick="openTab(event, 'patients')" >Patients data</li>
                        <li class = "tablinks"onclick="openTab(event, 'profile')" >Profile</li>
                    </ul>
                </div>

                <div id = "news" class="tabcontent">

                    <?php

                    $url = "https://www.news-medical.net/tag/feed/Parkinsons-Disease.aspx";
                    $xml = simplexml_load_file($url);

                    foreach($xml->children()->channel->item as $news) {

                        echo '<h3>'.$news->title.'</h3>
                        <p><pre>'.$news->pubDate.'</pre></p>
                        <p>'.$news->description.'
                        <a href = "'.$news->link.'" target="_blank">read more ...</a><br>';
                    }
                    ?>
                </div>
                <div id = "patients" class="tabcontent first">
                    <?php

                    include "patientsData.php";
                    ?>

                </div>
                <div id = "profile" class="tabcontent first">

                    <?php 
                    fetchUserData();
                    $mysql_user = "SELECT `user`.`email` FROM `user` WHERE Role_IDrole = 3";
                    $aUsers = $mysqli -> query($mysql_user);
                    authUsers($aUsers);//sends the quiry result to the html
                    ?>

                </div>

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
