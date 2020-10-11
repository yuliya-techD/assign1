
<?php 

//some variables to connect the database to the php file
DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_DATABASE', 'pd');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

//setting the new emails
$emails = array("physician@gmail.com", "researcher@gmail.com", "patient1@gmail.com", "patient2@gmail.com");
//setting the .csv data files
$data_files = array("data/data1.csv","data/data2.csv","data/data3.csv","data/data4.csv","data/data5.csv","data/data6.csv");

//setting the update for the user emails
for ($x = 0; $x <= count($emails); $x++) {
    $id = $x+1;
    $mail_update = "UPDATE user SET email='$emails[$x]' WHERE userID='$id' ";
   $mysqli->query($mail_update);
}
//setting the update for the test sessions' data
for ($x = 0; $x <= count($data_files); $x++) {
    $id=$x+1;
    $data_update = "UPDATE test_session SET DataURL='$data_files[$x]' WHERE test_sessionID='$id' ";
   $mysqli->query($data_update);
}


//connecting the db
if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
echo 'Welcome. Connected successfully.<br>';


?>
