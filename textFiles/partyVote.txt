<?php
echo '<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>';


$query = "SELECT p.party_name, COUNT(*) as votes
FROM CandidateVote cv JOIN Candidate c ON cv.Candidate_Person_ssn=c.Person_ssn
					  JOIN Party p ON c.Party_party_code=p.party_code
GROUP BY p.party_name" ;

include("connection.php");

$result2 = $connection->query($query);

// while($row = $result2->fetch_assoc()){
//     $columns[] = $row['Field'];
// }

// foreach ($columns as $key => $value){
//     echo $value . '<br>';
// }

echo "<b> <center>How Many Votes Each Party Recieved</center> </b> <br> <br>";

if ($result = $connection->query($query)) {
    echo '<table id="myTable" class="display">';
echo     '<thead>
<tr>
    <th>'.'Party Name'.'</th>
    <th>'.'Votes '.'</th>
</tr>
</thead>';
echo ' <tbody>';
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["party_name"];
        $field2name = $row["votes"];
        echo '
        <tr>
            <td>'.$field1name.'</td>
            <td>'.$field2name.'</td>

        </tr>';
    }

    echo '</tbody> </table>';

/*freeresultset*/
$result->free();
}
?>

<?php
$query = "SELECT p.party_name, ROUND(COUNT(*) * 100.0 / (SELECT COUNT(*) FROM CandidateVote), 2) AS votes
FROM CandidateVote cv JOIN Candidate c ON cv.Candidate_Person_ssn=c.Person_ssn
					  JOIN Party p ON c.Party_party_code=p.party_code
GROUP BY p.party_name" ;

include("connection.php");

$result2 = $connection->query($query);

// while($row = $result2->fetch_assoc()){
//     $columns[] = $row['Field'];
// }

// foreach ($columns as $key => $value){
//     echo $value . '<br>';
// }

echo "<b> <center>By Percentage</center> </b> <br> <br>";

if ($result = $connection->query($query)) {
    echo '<table id="myTable2" class="display">';
echo     '<thead>
<tr>
    <th>'.'Party Name'.'</th>
    <th>'.'Votes '.'</th>
</tr>
</thead>';
echo ' <tbody>';
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["party_name"];
        $field2name = $row["votes"];
        echo '
        <tr>
            <td>'.$field1name.'</td>
            <td>'.$field2name.'%'.'</td>

        </tr>';
    }

    echo '</tbody> </table>';

/*freeresultset*/
$result->free();
}
?>



<a href="<?php echo $directory_path?>index.php"> back</a>

<script>
$(document).ready(function() {
    $('#myTable').DataTable({"order": [[ 1, "desc" ]]});

    $('#myTable2').DataTable({"order": [[ 1, "desc" ]]});
    
} );


</script>



