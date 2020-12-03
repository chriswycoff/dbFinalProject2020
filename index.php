<?php 
include("globals.php");
?>
<html>
	<head>
	<title>Voter Console</title>
		<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script> 	
		<style>
		body {font-family: calibri;color:#4e7480;}
		</style>
	</head>
	<body>
	<div class="container">
        Welcome
        <br>
        <p>
Which database table would you like to see?
<!-- <select name="fromQuery">
  <option value="">Select...</option>
  <option value="Candidate">Candidates</option>
  <option value="Measure">Measures</option>
  <option value="Party">Parties</option>
  <option value="Person">People</option>
  <option value="Vote">Voter</option>
</select>
</p> -->
<form method="post" action = "<?php echo $directory_path?>/displayResult.php" name = "myForm">
<select name="fromQuery">
<!-- <option value="">Select...</option> -->
<?php
include("connection.php");

$tableQuery = "SHOW TABLES";

$result = $connection->query($tableQuery);

$listdbtables = array_column(mysqli_fetch_all($result),0);

foreach($listdbtables as $value){
    echo '<option value="'.$value.'">'.$value.'</option>';
}

?>

</select>
<input type = "submit" value = "Submit" />
</form>
		</div>
	</body>
</html>

<!-- Start President  -->

<form method="post" action = "<?php echo $directory_path?>/presidentVote.php" name = "presidentForm">
<input type="hidden" value="fromQuery" name="Candidate"/>
<input type = "submit" value = "Who Won the Presidency?" />
</form>


<!-- End President  -->


<!-- End Measures Start -->

<form method="post" action = "<?php echo $directory_path?>/measureVote.php" name = "measureForm">
<select name="measureNum">
<!-- <option value="">Select...</option> -->
<?php

$tableQuery = "SELECT measure_id FROM Measure;";

$result = $connection->query($tableQuery);

$listdbtables = array_column(mysqli_fetch_all($result),0);

foreach($listdbtables as $value){
    echo '<option value="'.$value.'">'.$value.'</option>';
}
?>
</select>
<input type = "submit" value = "See Result of Measure" />
</form>

<!-- End Measures  -->

<!-- Start Total Votes for Each Party -->
<form method="post" action = "<?php echo $directory_path?>/partyVote.php" name = "partyVoteForm">

<input type = "submit" value = "Vote total to each party Pary" />
</form>

<!-- End total votes for each party -->

<!-- Start all voters registered certain year -->

<form method="post" action = "<?php echo $directory_path?>/votersRegisteredInYear.php" name = "votersRegisterdInYear">
<select name="registrationYear">
<!-- <option value="">Select...</option> -->
<?php

$tableQuery = "SELECT distinct year(CAST(v.reg_date AS Date)) AS reg_date
FROM Voter v JOIN Person p ON v.Person_ssn=p.ssn
order by reg_date;";

$result = $connection->query($tableQuery);

$listdbtables = array_column(mysqli_fetch_all($result),0);

foreach($listdbtables as $value){
    echo '<option value="'.$value.'">'.$value.'</option>';
}
?>
</select>
<input type = "submit" value = "See all people registered in year" />
</form>

<!-- End all voters registered certain year -->



<!-- Start all voters for a certain party -->

<form method="post" action = "<?php echo $directory_path?>/votersForParty.php" name = "voterForPartyForm">
<select name="partyName">
<!-- <option value="">Select...</option> -->
<?php

$tableQuery = "SELECT party_name FROM Party;";

$result = $connection->query($tableQuery);

$listdbtables = array_column(mysqli_fetch_all($result),0);

foreach($listdbtables as $value){
    echo '<option value="'.$value.'">'.$value.'</option>';
}
?>
</select>
<input type = "submit" value = "See all people in party" />
</form>

<!-- End all voters for a certain party -->

<!-- <script>
$(document).ready(function() {
    $('#contact-detail').dataTable({
		"scrollX": true,
		"pagingType": "numbers",
        "processing": true,
        "serverSide": true,
        "ajax": {'type': 'POST',"url": "server_side.php", "data":{"hi": 2}}
    } );
} );
</script> -->
