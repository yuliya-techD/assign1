<?php
require_once "configGoogle.php";
require_once "configDiscord.php";
require "configGithub.php";
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>

        <div class="container">
            <h2 style="text-align:center"> Welcome to PSAPP</h2>
            <h4 style="text-align:center"> the newest Parkinson's Desease social application for patients, phycians and researchers </h4>

            <div class="panel-container">

                <div id="patient" class="panels">  
                    <div class="overlay"></div>
                    <div class = "button" >
                        <a href="dLogin.php" class="twitter btn" style="text-align:center;
                                                                        background-color: black;">
                            <i class="fa fa-discord fa-fw"></i>
                            Login as a patient<br> with Discord</a>
                    </div>
                </div>


                <div id="physician" class="panels"> 
                    <div class="overlay"></div>
                    <div class = "button">
                        <a href="<?php echo $authUrl?>" class="google btn" style="text-align:center;
                                                                                  background-color: black;">
                            <i class="fa fa-google fa-fw">
                            </i> 
                            Login as physician <br> with Gmail
                        </a>
                    </div>       
                </div>




                <div id="researcher" class="panels">
                    <div class="overlay"></div>
                    <div class = "button">
                        <a href="ghLogin.php" class="linkedin btn" style="text-align:center;
                                                                          background-color: black;">
                            <i class="fa fa-github fa-fw">
                            </i> Login as researcher <br> with Github
                        </a>
                    </div>
                </div>

            </div>

            <div>

            </div>

        </div>

    </body>
</html>