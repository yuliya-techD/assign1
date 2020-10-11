<?php 
include 'index1.php';
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
                    <div class = "button">
                    <a href="patient.php" class="twitter btn">
                        <i class="fa fa-twitter fa-fw">
                        </i> Login with Twitter
                    </a>
                    </div>
                </div>
                <div id="physician" class="panels"> 
                    <div class="overlay"></div>
                    <div class = "button">
                    <a href="physician.php" class="google btn">
                    <i class="fa fa-google fa-fw">
                    </i> Login with Google+
                    </a>
                    </div>
                    
                </div>
                <div id="researcher" class="panels">
                    <div class="overlay"></div>
                    <div class = "button">
                    <a href="researcher.php" class="linkedin btn">
                        <i class="fa fa-linkedin fa-fw">
                        </i> Login with LinkedIn
                    </a>
                    </div>
                    
                </div>
                
            </div>

        </div>

    </body>
</html>