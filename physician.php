<?php 
include 'index1.php';
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
                $mysqlrole = "SELECT * FROM `role`";
                $mysqluser = "SELECT * FROM `user`";
                $mysqltest_session ="SELECT DataURL FROM `test_session`";
                // Perform query
                if ($result = $mysqli -> query($mysqltest_session)) {
                    echo "<br><h1>All users in PSAPP are:</h1> " ;
                    while ($row = $result -> fetch_row()) {
                        printf ("<a href = \"%s\">%s</a><br>", $row[0], $row[0]);
                    }
                    // Free result set
                    $result -> free_result();
                }

                //end
                mysqli_close($mysqli);
                ?>
            </div>
        </body>
    </html>
</DOCTYPE>