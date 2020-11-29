<?php

$sql_details = array(
    'user' => 'chris',
    'pass' => 'P@ssword',
    'db'   => 'mydb',
    'host' => 'ix.cs.uoregon.edu:3966'
);

$table = 'Candidate';
 
$primaryKey = 'Person_ssn';
 
$columns = array(
    array( 'db' => 'Person_ssn', 'dt' => 0 ),
    array( 'db' => 'Party_party_code',  'dt' => 1 ),
    array( 'db' => 'Position_pos_id',   'dt' => 2 ),

   
);
 
 
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>