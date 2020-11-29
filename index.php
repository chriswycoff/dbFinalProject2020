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
What would you like to see?
<!-- <select name="fromQuery">
  <option value="">Select...</option>
  <option value="Candidate">Candidates</option>
  <option value="Measure">Measures</option>
  <option value="Party">Parties</option>
  <option value="Person">People</option>
  <option value="Vote">Voter</option>
</select>
</p> -->
<select name="fromQuery">
<option value="">Select...</option>
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


		</div>
	</body>
</html>


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
