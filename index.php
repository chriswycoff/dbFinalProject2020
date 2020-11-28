<?php

echo "HELLO WORLD";

$username = "chris";
$password = "P@ssword";
$database = "mydb";
$mysqli = new mysqli("ix.cs.uoregon.edu:3966", $username, $password, $database);

$query = "SELECT * FROM Candidate";
echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $mysqli->query($query)) {
echo "got here";
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Person_ssn"];
        $field2name = $row["Party_party_code"];
        $field3name = $row["Position_pos_id"];

        echo '<b>'.$field1name.$field2name.'</b><br />';
        echo $field3name.'<br />';
    }

/*freeresultset*/
$result->free();
}




?>