
<?php
echo '<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>';

$query = "SELECT CONCAT(x.fname, ' ', x.lname) AS fullname, x.pos_name, x.votes
FROM (SELECT p.fname, p.lname, pos.pos_name, COUNT(*) AS votes
      FROM CandidateVote cv JOIN Candidate c ON c.Person_ssn=cv.Candidate_Person_ssn
                      JOIN Person p ON cv.Candidate_Person_ssn=p.ssn
                      JOIN Position pos ON pos.pos_id=c.Position_pos_id
      GROUP BY cv.Candidate_Person_ssn) x
WHERE x.pos_name='President'
ORDER BY x.votes DESC" ;

include("connection.php");

$result2 = $connection->query($query);

// while($row = $result2->fetch_assoc()){
//     $columns[] = $row['Field'];
// }

// foreach ($columns as $key => $value){
//     echo $value . '<br>';
// }

echo "<b> <center>Who Won the Presidency?</center> </b> <br> <br>";

if ($result = $connection->query($query)) {
    echo '<table id="myTable" class="display">';
echo     '<thead>
<tr>
    <th>'.'fullname'.'</th>
    <th>'.'pos_name'.'</th>
    <th>'.'votes'.'</th>
</tr>
</thead>';
echo ' <tbody>';
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["fullname"];
        $field2name = $row["pos_name"];
        $field3name = $row["votes"];
        echo '<tr>
            <td>'.$field1name.'</td>
            <td>'.$field2name.'</td>
            <td>'.$field3name.'</td>
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
    $('#myTable').DataTable();
} );
</script>