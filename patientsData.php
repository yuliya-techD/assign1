<?php

echo '<link href="tabs.css" media="screen" rel="stylesheet" type="text/css" />';	
function test_session($idTherapy){
    $mysqltest_session ="SELECT dateTime,DataURL FROM `test` INNER JOIN `test_session` ON test.testID = test_session.Test_IDtest WHERE test.Therapy_IDtherapy =".$idTherapy;
    return $mysqltest_session;
}
// Perform query
$patient1 =$mysqli->query(test_session(1));
$patient2 =$mysqli->query(test_session(2));
$csvFile;
function sessionData($patient, $i){
    if ($result = $patient ) {
        echo "<br><h1>Test results for patient".$i."</h1>";
        while ($row = $result -> fetch_row()) {
            echo '<div class="test-session">';
            printf ("<p>%s <button><a href = \"%s\">Download</a></button></p>", 
                    $row[0],$row[1], $row[1]);
            echo '<div class="test-results"><pre>';
            dataView($row[1]);  
            echo "</pre></div>";
            echo "</div>";
        }
        // Free result set
        $result -> free_result();
    }
}
sessionData($patient1,1);
sessionData($patient2,2);

//end
mysqli_close($mysqli);

function dataView($filename){       
    if (file_exists($filename)) {
        $f = fopen($filename, "r");
        while (($line = fgetcsv($f)) !== false) {

            foreach ($line as $cell) {
                echo "<td>" .$cell . "  </td>";
            }
        }
        fclose($f);
    }else{ 
        echo "<tr><td>No file exists ! </td></tr>" ;
    }

}


?>