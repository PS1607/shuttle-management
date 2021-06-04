<?php  require_once('Connection/DB_Connection_Details.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Current Running Shuttles</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		@import url("https://fonts.googleapis.com/css?family=Fira+Sans");
		body {
		  background-image: url("background_1.jpg");
		    background-size: 100%;
		  background-repeat: no-repeat;
		}
	</style>

	<!--Fixing Bootstrap-->
	<style>
		.panel-info>.panel-heading {
		  color: #006b6b;
		  background-color: #91c7c7;
		  border-color: #009ab9;   
		}
		.panel-success>.panel-heading {
		    color: #270084;
		  background-color: #9788bb;
		  border-color: #4a00ff;
		}
	</style>  

	<style>
		.navbar {
		  overflow: hidden;
		  background-color: #000000;
		  position: fixed; /* Set the navbar to fixed position */
		  top: 0; /* Position the navbar at the top of the page */
		  width: 100%; /* Full width */
		}

		/* Links inside the navbar */
		.navbar a {
		  float: left;
		  display: block;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}

		/* Change background on mouse-over */
		.navbar a:hover {
		  background: #ddd;
		  color: black;
		}   
	</style>

	<style>

        .box1{
            width: fit-content;
            padding: 10px;
            margin-left: auto;
            margin-right: auto;
        }
        .title-div{
            align: center
        }
        table.blueTable {
            border: 1px solid #1C6EA4;
            background-color: #EEEEEE;
            width: 30%;
            text-align: left;
            border-collapse: collapse;
        }
        table.blueTable td, table.blueTable th {
            border: 1px solid #AAAAAA;
            padding: 3px 16px;
        }
        table.blueTable tbody td {
            font-size: 13px;  
        }
        table.blueTable tr:nth-child(even) {
            background: #f3a9b8;
        }
        table.blueTable thead {
            background: #FFFFFF;
        }
        table.blueTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #000000;
            text-align: center;
            border-left: 2px solid #D0E4F5;
        }
        table.blueTable thead th:first-child {
            border-left: none;
        }

        table.blueTable tfoot td {
            font-size: 14px;
        }
        table.blueTable tfoot .links {
            text-align: right;
        }
        table.blueTable tfoot .links a{
            display: inline-block;
            background: #1C6EA4;
            color: #FFFFFF;
            padding: 2px 8px;
            border-radius: 5px;
        }
        .myButton {	
            background-color:#fe1a00;
            border-radius:4px;
            border:2px solid #d83526;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:16px;
            font-weight:bold;
            padding:6px 12px;
            text-decoration:none;
            text-shadow:0px 1px 0px #b23e35;
        }
        .myButton:hover {
            background-color:#ce0100;
        }
        .myButton:active {
            position:relative;
            top:1px;
        }
	</style>

</head>
<body>

	<!--navbar-->
    
    <div class="navbar">
	    <a href="about.html">About</a>
	    <a href="feedback.php">Feedback</a>
	    <a href="mailto:prakharsharma1607@gmail.com">Contact Us</a>
	    <a href="logout.php">Logout</a>
    </div>

	<!--end of navbar -->

	<br><br><br><br>


</body>
</html>


<?php

	$sql_url = "SELECT * FROM shuttle_details";
	$result_url = mysqli_query($conn, $sql_url);
	$totalRows_url = mysqli_num_rows($result_url);

	if($totalRows_url>0){
		$url_count = 0;

		echo "<div class =\"box1\" position: center>
		<table id=\"list\" class=\"blueTable\" style=\"background-color:white; width: 80%; margin-left: auto; margin-right: auto;\">
	  <caption style=\"color: black;\"><h3><center>Shuttle Details</center></h3></caption>
	  <thead>
		<tr>
			<th style=\"text-align:center\">Shuttle ID</th>
			<th style=\"text-align:center\">Driver</th>
			<th style=\"text-align:center\">Source</th>
			<th style=\"text-align:center\">Destination</th>
			<th style=\"text-align:center\">Duration</th>
			<th style=\"text-align:center\">Maximum Seats</th>
		</tr>
	  </thead>";

	  do {
	        $row_url = mysqli_fetch_assoc($result_url);
	        $url_count++;
			$shutid = $row_url["shut_id"];
			$driver = $row_url["driver"];
			$source = $row_url["source"];
			$destination = $row_url["destination"];
			$duration = $row_url["duration"];
			$max_seats = $row_url["max_seats"];

	        echo "<tbody><tr>";
					echo "<td style=\"text-align:center\">".$shutid."</td>";
					echo "<td style=\"text-align:center\">".$driver."</td>";
					echo "<td style=\"text-align:center\">".$source."</td>";
					echo "<td style=\"text-align:center\">".$destination."</td>";
					echo "<td style=\"text-align:center\">".$duration."</td>";
					echo "<td style=\"text-align:center\">".$max_seats."</td>";
				echo "</tr></tbody>";
		echo "</div>";
	
		} while ($url_count < $totalRows_url);
	}

	else{
		echo '<script type="text/javascript">
          alert("No Data Available")
          </script>'; 
	}


	echo "<br><button onclick=\"location.href='admin.php'\" type=\"button\" class=\"btn btn-primary\" value=\"exit\">Go Back</button>";











?>