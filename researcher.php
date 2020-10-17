<?php
require_once "index1.php";
?>
<DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="main.css">
        </head>
        <body>
            <a href="index.php">PSAPP</a> 
            <a href="researcher.php">researcher1</a>
            <a href="index.php">log out</a>

        </body>
    </html>
</DOCTYPE>
<div>
    <?php 
    $mysql_user = "SELECT `user`.`email` FROM `user` WHERE Role_IDrole = 3";
    $aUsers = $mysqli -> query($mysql_user);
    authUsers($aUsers);//sends the quiry result to the html
    ?>
</div>