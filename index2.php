<?php
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';
echo '<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>';
echo '<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>';

$username = "chris";
$password = "P@ssword";
$database = "mydb";
$mysqli = new mysqli("ix.cs.uoregon.edu:3966", $username, $password, $database);

$query = "SELECT * FROM Candidate";
echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $mysqli->query($query)) {
    echo '<table id="myTable" class="display">';
echo     '<thead>
<tr>
    <th>'.'Person_ssn'.'</th>
    <th>'.'Party_party_code'.'</th>
    <th>'.'Position_pos_id'.'</th>
</tr>
</thead>';

    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Person_ssn"];
        $field2name = $row["Party_party_code"];
        $field3name = $row["Position_pos_id"];
        
    echo ' <tbody>
        <tr>
            <td>'.$field1name.'</td>
            <td>'.$field2name.'</td>
            <td>'.$field3name.'</td>
        </tr>';
    }
    echo '</tbody>
    </table>';

/*freeresultset*/
$result->free();
}

// echo "<script>$(document).ready( function () {
//     $('#myTable').DataTable();
// } );</script>";
// for some reason buggy? ^^^^ 


?>