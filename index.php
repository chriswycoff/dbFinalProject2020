<?php

echo "HELLO WORLD";

$username = "chris";
$password = "P@ssword";
$database = "mydb";
$mysqli = new mysqli("ix.cs.uoregon.edu:3966", $username, $password, $database);

$query = "SELECT * FROM Candidate";
echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $mysqli->query($query)) {
echo     '<thead>
<tr>
    <th>'.'Person_ssn'.'</th>
    <th>'.'Party_party_code'.'</th>
</tr>
</thead>';

    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Person_ssn"];
        $field2name = $row["Party_party_code"];
        $field3name = $row["Position_pos_id"];

       echo '<table id="table_id" class="display">
    <tbody>
        <tr>
            <td>'.$field1name.'</td>
            <td>'.$field2name.'</td>
            <td>'.$field3name.'</td>
        </tr>
    </tbody>
    </table>';
    }

/*freeresultset*/
$result->free();
}




?>