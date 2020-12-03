<?php
echo '<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>';

$measureNum = $_POST['measureNum'];

$query = "SELECT x.measure_id, x.yes_no, COUNT(*) as votes
FROM (SELECT m.measure_desc, m.measure_id, mv.yes_no
      FROM MeasureVote mv JOIN Measure m ON mv.Measure_measure_id=m.measure_id
      WHERE mv.Measure_measure_id=$measureNum) x
GROUP BY x.yes_no
ORDER BY votes DESC" ;

include("connection.php");

$result2 = $connection->query($query);

// while($row = $result2->fetch_assoc()){
//     $columns[] = $row['Field'];
// }

// foreach ($columns as $key => $value){
//     echo $value . '<br>';
// }

echo "<b> <center>Did Measure $measureNum Pass?</center> </b> <br> <br>";

if ($result = $connection->query($query)) {
    echo '<table id="myTable" class="display">';
echo     '<thead>
<tr>
    <th>'.'measure_id'.'</th>
    <th>'.'yes_no'.'</th>
    <th>'.'votes'.'</th>
</tr>
</thead>';
echo ' <tbody>';
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["measure_id"];
        $field2name = $row["yes_no"];
        $field3name = $row["votes"];
        echo '
        <tr>
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
    $('#myTable').DataTable({"order": [[ 2, "desc" ]]});
} );
</script>
