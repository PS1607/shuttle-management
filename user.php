<?php  require_once('Connection/DB_Connection_Details.php'); ?>
<?php session_start(); ?>
<?php   
  $t= $_SESSION['logged_user'];
  if($t!=0){

  }
  else{
    header("Location: index.php");
    die();

  }
?>
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

<style>
@import url("https://fonts.googleapis.com/css?family=Fira+Sans");
body {
  background-image: url("background.jpg");
    background-size: 100%;
	background-repeat: no-repeat;
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
<!--generic info-->
<br><br><br><br>	
<div class= "container-fluid">
 <div class= "col-md-4" >
  <div class= "panel panel-info" id="info" >
      <div class= "panel-heading">
        <h4 class= "panel-title" align="center"> Your Information </h4>
      </div> 

<?php 

$t= $_SESSION['logged_user'];
if($conn->connect_error){
    die("Connection failed".mysqli_connect_error());
}
  $result= $conn->query ("SELECT * FROM customer1 where cid = '$t'");
  $row = $result->fetch_assoc();
  $result1= $conn->query ("SELECT * FROM ride_details where cid = '$t' ORDER BY rid DESC LIMIT 1");
  $row1 = $result1->fetch_assoc();

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
   <div class= "wrapper">
   <button onclick="location.href='booking.php'" type="button" class="btn btn-success" value="book">
     Book Shuttle</button>
   </div>
      </div>
    </div>
</div>

<!-- end of generic info-->
<div class="col-md-8">
  <div class="panel panel-success">
    <div class="panel-heading" align="center">
		<h4 class= "panel-title" align="center"> Dashboard </h4>  
	</div>
    <div class="panel-body log">
		<ul>
			<li><a href="AccountChange.php"><h5 style="color:black;">Modify Account</h5></a></li>
			<li><a href="payment1.php"><h5 style="color:black;">Add Amount</h5></a></li>
			<li><a href="first_page.php"><h5 style="color:black;">Booking History</h5></a></li>
      	</ul>
    </div>
  </div>
</div>
</div>

</body>
</html>

