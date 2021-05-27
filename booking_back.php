<?php session_start(); ?>
<?php require_once('Connection/DB_Connection_Way2.php'); ?>
<?php   
  $id = $_GET['pid'];
  //echo $id;
  $t= $_SESSION['logged_user'];
  $sql_url = "SELECT * FROM combine where id='$id'";
  $result_url = mysqli_query($conn, $sql_url);
  $totalRows_url = mysqli_num_rows($result_url);
  $row_url = mysqli_fetch_assoc($result_url);

  $id = $row_url["id"];
  $shutid = $row_url["shut_id"];
  $arrival = $row_url["arrival"];
  $departure = $row_url["departure"];
  $s = $row_url["Source"];
  $d = $row_url["Destination"];

  //echo $t."/".$id."/".$shutid."/".$arrival."/".$departure."/".$s."/".$d."/";

  if($t!=0){

  }
  else{
    header("Location: index.php");
    die();

  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Shuttle: Travel Along!</title>
</head>
<body>
	<form id="form1" action="#" method="POST">
		<h3>RS.15 will be deducted from your account.</h3>
		<button name="submit" type="submit" value="submit" class="btn btn-primary">Okay!</button>
	</form>

</body>
</html>

<?php

if(isset($_POST['submit'])){

  $now=date('H:i:s');
  if($t!=0){
    $sql_url1 = "INSERT INTO booking_details (cid, shut_id, source, destination, fare, ride_time)
              VALUES ('$t', '$shutid', '$s', '$d', '15', '$arrival');"; 

    $result= $conn->query ("SELECT * FROM customer1 WHERE cid = '$t'");
  	$row = $result->fetch_assoc();
  	$g = $row['amount'];
  	$h = $g - 15;

	$sql_url2 = "UPDATE customer1 SET amount='$h' WHERE cid='$t'";
	//$row1 = $result1->fetch_assoc();

    if ($conn->query($sql_url1) === TRUE && $conn->query($sql_url2) === TRUE) {
    echo '<script type="text/javascript">
          alert("Seat Booked")
          window.location="user.php";
          </script>'; 
    } 
    else {
        echo "Error: " . $sql_url1 . "<br>" . $conn->error;
        echo "Error: " . $sql_url2 . "<br>" . $conn->error;
    }

    
  }
  
}



?>