<?php  require_once('Connection/DB_Connection_Details.php'); ?>
<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
<title> Shuttle: Travel along! </title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
body {
  background-image: url("background.jpg");
    background-size: 100%;
}
.detail
{
	height:500px;
}

#pholder {
	max-height: 100px;
	max-width: 100px;
}

.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

.wrapper {
	text-align: center;
}

#info {

}

#footer {
  background-color: #e3f2fd;
   height: 50px;
    font-family: 'Verdana', sans-serif;
    padding: 20px;
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
    <a href="logout.php">Logout</a>
    </div>

<!--end of navbar -->
<br><br><br><br>
<!--generic info-->
<div class= "container-fluid">
 <div class= "col-md-4" >
  <div class= "panel panel-info" id="info" >
      <div class= "panel-heading">
        <h4 class= "panel-title" align="center"> Your Information </h4>
      </div> 
<?php 
//$_SESSION['logged_user']=1;
//session_start();

$t= $_SESSION['logged_user'];

    $sql= "SELECT * FROM customer1 where cid = '$t'";
    $result = mysqli_query ($conn,$sql);
    $row = mysqli_fetch_assoc($result);


  //echo mysqli_num_rows($result1);
  /*if (mysqli_num_rows($result)>0)
  {
    $count= mysqli_num_rows($result);
  }
 while($row = $res1->fetch_assoc()) 
{*/

  $f = $row['name'];
  $n = $row['registration_no'];
  $e = $row['email'];
  $g = $row['amount'];
  if(file_exists("uploads/".$n.".jpg")){
      $jpg = "uploads/".$n.".jpg";
  }
  else{
      $jpg = "images/placeholder.png";
  }

//mysqli_close($conn);

?>
    <div class= "panel panel-body detail">
      <img id="pholder" class= "center" src="<?php echo "$jpg"; ?>">
      <br>
      <br>
      <table class = "table">
    <tr>
         <td align="center">Name: <?php echo "$f"; ?></td>
      </tr>
      
      <tr>
         <td align="center">Registration No: <?php echo "$n"; ?></td>
      </tr>
      
      <tr>
         <td align="center">E-mail: <?php echo "$e"; ?></td>
      </tr>
            <tr>
         <td align="center">Credit Balance: <?php echo "$g";?></td>
      </tr>
   </table>
   <br>
   <br>
   <!-- <div class= "wrapper">
    <button onclick="location.href='GPS.php'" type="button" class="btn btn-success" value="track">
     Track your shuttle</button>
   </div> -->

      </div>
    </div>
  </div>
<!-- end of generic info-->
<div class="col-md-8">
  <div class="panel panel-success">
    <div class="panel-heading" align="center"><b>Booking Details</b></div>
    <h3 align="center">Booking History</h3>
    <div class="panel-body log">
      
          <table class="table table-bordered">
    <thead>
      <tr>
        <th>Shuttle ID</th>
        <th>Driver Name</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Fare</th>
        <th>Date and Time</th>
        <th></th>
        
      </tr>
    </thead>
<tbody>

<?php
  //$result2;
  $sql2= "SELECT * FROM booking_details where cid = '$t'";
  $result2 = mysqli_query ($conn,$sql2);
  while ($row2 = mysqli_fetch_assoc($result2))
  {
    $sc = $row2['source'];
    $ds = $row2['destination'];
    $fr = $row2['fare'];
    $ti = $row2['ride_time'];
    $shutid = $row2['shut_id'];

    $sql3= "SELECT * FROM shuttle_details where shut_id = '$shutid'";
    $result3 = mysqli_query ($conn,$sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $dn = $row3['driver'];
  ?>
      <tr>
        <td><?php echo "$shutid"; ?></td>
        <td><?php echo "$dn"; ?></td>
        <td><?php echo "$sc"; ?></td>
        <td><?php echo "$ds"; ?></td>
        <td><?php echo "$fr"; ?></td>
        <td><?php echo "$ti"; ?></td>
        <td><?php 
              
                echo "<a class=\"myButton\" href='".$page."?pid=".$row_url['id']."'>Cancel</a>"; 

              ?></td>
      </tr>
<?php } ?>   
    </tbody>
  </table>
  <div class="wrapper">
  <button onclick="window.location='user.php'" class="btn btn-success" type="submit" >Exit</button>
  </div>
    </div>
  </div>
</div>
</div>

</body>
</html>
