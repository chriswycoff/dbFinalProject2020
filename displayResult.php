<?php
            $table = $_POST["fromQuery"];
            if (empty($table)){
            header('location: http://localhost:8080/index.php');
                die;
            }
?>
<html>
	<head>
	<title>Result of Query!</title>
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
            
            $complexQuery = $_POST["complexQuery"];
            $isComplex = 0;
            if (empty($complexQuery)){
                echo "non complex";
            }
            else{
                $isComplex = 1;
            }
            echo '<h1>' . $table . 's' . '</h1>'; // displays table name
            include("connection.php");
            $query2 = "DESCRIBE $table";

        $result2 = $connection->query($query2);

    while($row = $result2->fetch_assoc()){
        $columns[] = $row['Field'];
    }
    echo '<tr>';
foreach ($columns as $key => $value){
    echo '<th>'.$value.'</th>'
;}

            echo '</tr>';
            // $sql = "SHOW COLUMNS FROM Measure";
            // $result = mysqli_query($connection,$sql);
            // while($row = mysqli_fetch_array($result)){
            //     echo $row['Field']."<br>";
            // }
            //  proof of concept above
?>
		</thead>
		</table>
		</div>
	</body>
</html>


<script>
    let table = "<?php echo $table;?>"; // gets table
    let isComplex = <?php echo $isComplex;?>;
$(document).ready(function() {
    $('#contact-detail').dataTable({
		"scrollX": true,
		"pagingType": "numbers",
        "processing": true,
        "serverSide": true,
        "ajax": {'type': 'POST',"url": "server_side.php", "data" : {"table": table, "type": isComplex }}
    } );
} );

</script>
<a href="index.php"> back</a>