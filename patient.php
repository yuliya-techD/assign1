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
            <a href="#"> patient 1 </a>
            <a href="index.php">log out</a><br>

            <div>
                <?php 

                $client_key = "AIzaSyCvYcxdGAA96v06-sCcWGWkuhxLJZ2kDh8";
                $basic_request_url = "https://www.googleapis.com/youtube/v3/";
                $pd_channel_id = "UC9QTes9SMZKbSzDS-nvhr3g";
                $maxResult = 2;
                $API_request_url = $basic_request_url . "search?order=date&part=snippet&channelId=".$pd_channel_id."&maxResults=".$maxResult ."&key=".$client_key;

                $pd_videos = json_decode(file_get_contents($API_request_url));
                $pd_video_title = $pd_videos->items[0]->snippet->title;
                $pd_video_id = $pd_videos->items[0]->id->videoId;
                    
                foreach($pd_videos->items as $video){
                    $title = $video->snippet->title;
                    $id = $video->id->videoId;
                    echo'<lable style = "margin:10px;">'.$title.'</lable><br>';
                    echo '<iframe style = "width:480px;height:250px;margin:2%;" src="https://www.youtube.com/embed/'.$id.'" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe><br>';                
                }

                ?>
                <br>
            </div>
            <iframe width="768" height="480" src="https://www.youtube.com/embed/GsjiwrVXwdY?list=PL4QohjtCEzJ4ei5BTK9ClnjorI1gFfgKq" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </body>
    </html>
</DOCTYPE>
<?php
                $mysql_user = "SELECT `user`.`email` FROM `user` WHERE Role_IDrole = 1";
                $aUsers = $mysqli -> query($mysql_user);
                authUsers($aUsers);//sends the quiry result to the html
require_once "configTwitter.php";
?>