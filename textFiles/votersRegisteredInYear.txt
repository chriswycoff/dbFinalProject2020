<?php
echo '<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>';

$registrationYear = $_POST['registrationYear'];

$query = "SELECT CONCAT(p.fname, ' ', p.lname) AS fullname, CAST(v.reg_date AS Date) AS reg_date
FROM Voter v JOIN Person p ON v.Person_ssn=p.ssn
WHERE YEAR(v.reg_date)=$registrationYear" ;

include("connection.php");

// $result2 = $connection->query($query);

// while($row = $result2->fetch_assoc()){
//     $columns[] = $row['Field'];
// }

// foreach ($columns as $key => $value){
//     echo $value . '<br>';
// }

echo "<b> <center>Voters registered in $registrationYear</center> </b> <br> <br>";

if ($result = $connection->query($query)) {
    echo '<table id="myTable" class="display">';
echo     '<thead>
<tr>
    <th>'.'Name'.'</th>
    <th>'.'Date Registered'.'</th>
</tr>
</thead>';
echo ' <tbody>';
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["fullname"];
        $field2name = $row["reg_date"];
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

<a href="<?php echo $directory_path?>index.php"> back</a>

<script>
$(document).ready(function() {
    $('#myTable').DataTable({"order": [[ 1, "desc" ]]});
} );
</script>
