<?php

$sql_details = array(
    'user' => 'chris',
    'pass' => 'P@ssword',
    'db'   => 'mydb',
    'host' => 'ix.cs.uoregon.edu:3966'
);

// $table = 'Candidate';

$table = $_POST["table"];
$columns = array();
// this is where modularity should go
include("connection.php");
        $query2 = "DESCRIBE $table";

        $result2 = $connection->query($query2);

    while($row = $result2->fetch_assoc()){
        $tempColumns[] = $row['Field'];
    }

foreach ($tempColumns as $key => $value){
    if ($key == 0){
        $primaryKey = $value;
    }
    array_push($columns, array( 'db' => $value, 'dt' => $key ));
;}
// print_r($columns);
// $primaryKey = 'Person_ssn';

// if ($table == "Candidate"){
// $primaryKey = 'Person_ssn';
//     $columns = array(
//         array( 'db' => 'Person_ssn', 'dt' => 0 ),
//         array( 'db' => 'Party_party_code',  'dt' => 1 ),
//         array( 'db' => 'Position_pos_id',   'dt' => 2 ),
//     );
// }

// else{
// $columns = array(
//     array( 'db' => 'Person_ssn', 'dt' => 0 ),
//     array( 'db' => 'Party_party_code',  'dt' => 1 ),
//     // array( 'db' => 'Position_pos_id',   'dt' => 2 ),
// );
// }
 
require('ssp.class.php');
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns)
);
?>