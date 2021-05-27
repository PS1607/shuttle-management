<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Booking Portal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
@import url("https://fonts.googleapis.com/css?family=Fira+Sans");
body {
  background-image: url("background.jpg");
    background-size: 100%;
	background-repeat: no-repeat;
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
      <a href="index.php">Home</a>
      <a href="about.html">About</a>
      <a href="feedback.php">Feedback</a>
	  <a href="mailto:prakharsharma1607@gmail.com">Contact Us</a>
	  <a href="index.php">Logout</a>
    </div>

<!--end of navbar -->
<br><br><br><br>
<form id="form1" action="#" method="POST" style="width: 40%; margin-left: auto; margin-right: auto;">
    <div class="form-group has-feedback">
    <label for="source">Source:</label>
    <input type="text" class="form-control" id= "source" name="source" list="sourcelist" placeholder="Source">
    <datalist id="sourcelist" >
      <option>SJT</option>
      <option>TT</option>
      <option>SMV</option>
      <option>Main Gate</option>
      <option>Men's Hostel</option>
      <option>Girls' Hostel</option>
    </datalist>
</div>
  <div class="form-group has-feedback">
    <label for="destination">Destination:</label>
    <input type="text" class="form-control" id="destination" name="destination" list="destinationlist" placeholder="Destination">
    <datalist id="destinationlist" >
      <option>SJT</option>
      <option>TT</option>
      <option>SMV</option>
      <option>Main Gate</option>
      <option>Men's Hostel</option>
      <option>Girls' Hostel</option>
    </datalist>
  </div>
  <div>
	<label for="destination">Time:</label>
    <input type="time" class="form-control" id="time" name="time" placeholder="Time">

  </div>
  <!--h5><strong> Vehicle Type: </strong></h5>
   <div class="form-check">
      <label class="form-check-label" for="mini">
        <input type="radio" class="form-check-input" id="mini" name="mini" value="mini" checked>Mini Shuttle
      </label>
    </div>

    <div class="form-check">
      <label class="form-check-label" for="micro">
        <input type="radio" class="form-check-input" id="micro" name="mini" value="micro">Micro Shuttle
      </label>
    </div-->
    <br>

  <button name="add" type="submit" value="add" class="btn btn-primary">Submit</button>
    <button onclick="location.href='user.php'" type="button" class="btn btn-primary" value="exit">
     Exit</button>
  </form>

<br><br>
<!--Table--

<table id="list" style="width: 80%; margin-left: auto; margin-right: auto;">
	  <caption>Available Shuttles</caption>

	<tr>
		<th>Shuttle ID</th>
		<th>Source</th>
		<th>Destination</th>
		<th>Arrival</th>
		<th>Departure</th>
	</tr>

	<tr>
		<td>Shuttle ID</td>
		<td>Source</td>
		<td>Destination</td>
		<td>Arrival</td>
		<td>Departure</td>
	</tr>
</table>

<---End Of Table-->


</body>
</html>

<?php require_once('Connection/DB_Connection_Way2.php'); ?>

<?php
if(isset($_POST['add']))
{

	$s= $_POST['source'];
	$d= $_POST['destination'];
	$h= $_POST['time'];

	$t= $_SESSION['logged_user'];
	//echo $t;
	//echo $h."<br>";
	//date_default_timezone_set('Asia/Kolkata');
	$time=strtotime($h);
	$plus30=strtotime("00:30");
	$atime=date('H:i:s',$time);
	$dtime=date('H:i:s',($time+$plus30));



	//echo $atime."***<br>";
	//echo $dtime."<br>";
	



	$sql_url = "SELECT * FROM combine where Source='$s' and Destination='$d' and arrival>='$atime' and departure<='$dtime'";
	$result_url = mysqli_query($conn, $sql_url);
	$totalRows_url = mysqli_num_rows($result_url);

	$result= $conn->query ("SELECT * FROM customer1 where cid = '$t'");
  	$row = $result->fetch_assoc();
  	$amount = $row['amount'];

  	if($amount<15){
  		$page="payment0.php";
  	}
  	else{
  		$page="booking_back.php";
  	}
	//echo $totalRows_url." Rows<br>";
	if($totalRows_url>0){
		$url_count = 0;

echo "<div class =\"box1\" position: center>
		<table id=\"list\" class=\"blueTable\" style=\"background-color:white; width: 80%; margin-left: auto; margin-right: auto;\">
	  <caption style=\"color: black;\"><h3><center>Available Shuttles</center></h3></caption>
	  <thead>
		<tr>
			<th style=\"text-align:center\">Shuttle ID</th>
			<th style=\"text-align:center\">Source</th>
			<th style=\"text-align:center\">Destination</th>
			<th style=\"text-align:center\">Arrival</th>
			<th style=\"text-align:center\">Departure</th>
			<th style=\"text-align:center\">Available Seats</th>
			<th style=\"text-align:center\">Book</th>
		</tr>
	  </thead>";
	    do {
	        $row_url = mysqli_fetch_assoc($result_url);
	        $url_count++;
	        $id = $row_url["id"];
	        $_SESSION['combine_id'] = $id;
			$shutid = $row_url["shut_id"];
			$arrival = $row_url["arrival"];
			$departure = $row_url["departure"];

			$sql_url1 = "SELECT * FROM seat_sts where shut_id='$shutid'";
			$result_url1 = mysqli_query($conn, $sql_url1);
			$totalRows_url1 = mysqli_num_rows($result_url1);
			$row_url1 = mysqli_fetch_assoc($result_url1);
			if($totalRows_url1==0){
				$available_seats = 60;
			}
			else{
				$available_seats = $row_url1["max_seats"] - $row_url1["book"];
			}
			

	        //echo $url_count."/".$id."/".$shutid."/".$arrival."/".$departure."<br>";
	       	echo "<form method = \"POST\" action = \"landing.php\">";
	        echo "<tbody><tr>";
					echo "<td style=\"text-align:center\">".$shutid."</td>";
					echo "<td style=\"text-align:center\">".$s."</td>";
					echo "<td style=\"text-align:center\">".$d."</td>";
					echo "<td style=\"text-align:center\">".$arrival."</td>";
					echo "<td style=\"text-align:center\">".$departure."</td>";
					//echo "<td> <a href = 'landing.php' . '?ID=' . $row_url["id"]</td>";
					echo "<td style=\"text-align:center\">".$available_seats."</td>";
					echo "<td> <a class=\"myButton\" href='".$page."?pid=".$row_url['id']."'>Book</a></td>";
				echo "</tr></tbody>";
			echo "</form>";
		echo "</div>";

	    } while ($url_count < $totalRows_url);

	}
	
	else{
		echo '<script type="text/javascript">
          alert("No Shuttles Available")
          window.location="booking.php";
          </script>'; 
	}
}
?>