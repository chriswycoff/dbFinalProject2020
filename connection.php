
<?php 
$username = "chris";
$password = "P@ssword";
$database = "mydb";
$connection = new mysqli("ix.cs.uoregon.edu:3966", $username, $password, $database);


$basic_queries = array("measure" => "SHOW COLUMNS FROM Measure",
                        "candidate" => "SHOW COLUMNS FROM Measure")
?>