<?php 
session_start();
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
            <a href="physician.php"> physician </a>
            <a href="index.php">log out</a><br>
            <div>
                <?php

                //variables for quiries 
                $mysqltest_session ="SELECT dateTime,DataURL FROM `test` INNER JOIN `test_session` ON test.testID = test_session.Test_IDtest WHERE test.Therapy_IDtherapy = 1";

                $mysqltest_session2 ="SELECT dateTime,DataURL FROM `test` INNER JOIN `test_session` ON test.testID = test_session.Test_IDtest WHERE test.Therapy_IDtherapy = 2";
                 // Perform query
                $patient1 =$mysqli->query($mysqltest_session);
                $patient2 =$mysqli->query($mysqltest_session2);
                if ($result = $patient1 ) {
                    echo "<br><h1>Download test results for patient1</h1>";
                    while ($row = $result -> fetch_row()) {
                        printf ("<p>%s <a href = \"%s\">%s</a></p>",  $row[0],$row[1], $row[1]);
                    }
                    // Free result set
                    $result -> free_result();
                }
                if ($result = $patient2 ) {
                    echo "<br><h1>Download test results for patien2</h1>";
                    while ($row = $result -> fetch_row()) {
                        printf ("<p>%s <a href = \"%s\">%s</a></p>",  $row[0],$row[1], $row[1]);
                    }
                    // Free result set
                    $result -> free_result();
                }

                $mysql_user = "SELECT `user`.`email` FROM `user` WHERE Role_IDrole = 2";
                $aUsers = $mysqli -> query($mysql_user);
                authUsers($aUsers);
                
                
                //end
                mysqli_close($mysqli);
                ?>
            </div> 
                     </body>
                </html>
            </DOCTYPE>

        <?php

        require_once "configGoogle.php";

        $code = isset($_GET['code']) ? $_GET['code'] : NULL;


        if(isset($code)) {
            echo "<pre>";
            echo "code is : ".  $code ;
            try {

                $token = $client->fetchAccessTokenWithAuthCode($code);
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