<html>
	<head>
	<title>Datatables</title>
		<link rel="stylesheet"  href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script> 	
		<style>
		body {font-family: calibri;color:#4e7480;}
		</style>
	</head>
	<body>
	<div class="container">
		<table id="contact-detail" class="display nowrap" cellspacing="0" width="100%">
		<thead>
            <?php 
            
            include("connection.php");
            // $sql = "SHOW COLUMNS FROM Measure";
            // $result = mysqli_query($connection,$sql);
            // while($row = mysqli_fetch_array($result)){
            //     echo $row['Field']."<br>";
            // }
            //  proof of concept above
			echo '<tr>
			<th>SSN</th>
			<th>Party Code</th>
			<th>Position</th>
            </tr>';
            ?>
		</thead>
		</table>
		</div>
	</body>
</html>

<script>
$(document).ready(function() {
    $('#contact-detail').dataTable({
		"scrollX": true,
		"pagingType": "numbers",
        "processing": true,
        "serverSide": true,
        "ajax": {'type': 'POST',"url": "server_side.php", "data":{"hi": 2}}
    } );
} );
</script>
