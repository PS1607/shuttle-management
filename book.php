<?php session_start(); ?>
<?php  require_once('Connection/DB_Connection_Details.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
<title> Shuttle: Travel along! </title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2018.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

#darshan {
  height: 500px;
  padding-top: 50px;
}

#footer {
  background-color: #e3f2fd;
   height: 50px;
    font-family: 'Verdana', sans-serif;
    padding: 20px;
}

#photo {
  max-height: 400px;
  max-width: 250px;
  padding-top: 20px;
  padding-left: 20px;
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
      <a href="user.php">Home</a>
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

if($conn->connect_error){
    die("Connection failed".mysqli_connect_error());
}
  $result= $conn->query ("SELECT * FROM customer1 where cid = '$t'");
  $row = $result->fetch_assoc();
  $result1= $conn->query ("SELECT * FROM ride_details where cid = '$t' ORDER BY rid DESC LIMIT 1");
  $row1 = $result1->fetch_assoc();
  //echo mysqli_num_rows($result1);
  /*if (mysqli_num_rows($result)>0)
  {
    $count= mysqli_num_rows($result);
  }
 while($row = $res1->fetch_assoc()) 
{*/

  $n = $row['name'];
  $e = $row['email'];
  $l = $row['registration_no'];
  $a = $row['amount'];
  $s = $row1['source'];
  $d = $row1['destination'];
	  
  if(file_exists("uploads/".$l.".jpg")){
	    $jpg = "uploads/".$l.".jpg";
  }
  else{
	    $jpg = "images/placeholder.png";
  }
//mysqli_close($conn);

?>

<!--Your Information-->	  
 <div class= "panel panel-body detail">
      <img id="pholder" class= "center" src="<?php echo "$jpg"; ?>">
      <br>
      <br>
      <table class = "table">
      <tr>
         <td align="center">Name: <?php echo "$n"; ?></td>
      </tr>
      
      <tr>
         <td align="center">E-mail: <?php echo "$e"; ?></td>
      </tr>
      
      <tr>
         <td align="center">Registration No: <?php echo "$l"; ?></td>
      </tr>
      <tr>
         <td align="center">Credit Balance: <?php echo "$a"; ?></td>
      </tr>
      <tr>
         <td align="center">Latest Trip: <?php if($s!=0 && $d!=0){echo " $s to $d  "; mysqli_close ($conn);}?></td>
      </tr>
   </table>
   <br>
   <br>
   <div class= "wrapper">
   </div>

      </div>
	  
	
    </div>
  </div>
<!-- end of generic info-->
	
<!--Call a shuttle-->
 <div class="col-md-4"align="center"> 
      <div class= "bg-light text-dark">
  
    <div class= "panel panel-info">
      <div class= "panel-heading">
        <h4 class= "panel-title"> Call a shuttle </h4>
      </div> 

    <div class= "panel panel-body" id="darshan">
<form id="form1" action="#" method="POST">
    <div class="form-group has-feedback">
    <label for="source">Source:</label>
    <input type="text" class="form-control" id= "source" name="source" list="sourcelist" placeholder="source">
    <datalist id="sourcelist" >
      <option> SJT</option>
      <option> TT</option>
      <option> MB</option>
      <option> CBMR</option>
    </datalist>
</div>
  <div class="form-group has-feedback">
    <label for="destination">Destination:</label>
    <input type="text" class="form-control" id="destination" name="destination" list="destinationlist" placeholder="destination">
    <datalist id="destinationlist" >
      <option> SJT</option>
      <option> TT</option>
      <option> MB</option>
      <option> CBMR</option>
    </datalist>
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
     <div>
     <h5><strong> Payment Mode: </strong></h5>
     <!--div class="form-check">
      <label class="form-check-label" for="cash">
        <input type="radio" class="form-check-input" id="cash" name="credit" value="cash" checked>Cash
      </label>
    </div-->

    <div class="form-check">
      <label class="form-check-label" for="credit">
        <input type="radio" class="form-check-input" id="credit" name="credit" value="credit">Credit
      </label>
    </div>
  </div>

  <button name="add" type="submit" value="add" class="btn btn-primary">Submit</button>
    <button onclick="location.href='user.php'" type="button" class="btn btn-primary" value="exit">
     Exit</button>
  </form>
  </div>
</div>
</div>
</div>

      <!--carousel type content-->
<!--div class="col-md-4" align="center"> 
      <div class= "bg-light text-dark">
  
    <div class= "panel panel-info">
      <div class= "panel-heading">
        <h4 class= "panel-title"> Shuttle types </h4>
      </div> 
<div class="w3-container w3-2018-sailor-blue w3-hover-black w3-animate-right" id="adv">
  <img id="photo" src="./images/micro.jpg">  
  <h2>Mini Shuttle</h2>
  <p>Mini Shuttle is the smallest yet most dearest child that will ensure that you'll have a comfortable ride.</p>
</div>
<div class="w3-container w3-2018-sailor-blue w3-hover-black w3-animate-right" id="adv">
  <img id="photo" src="./images/mini.jpg">  
  <h2>Micro Shuttle</h2>
  <p>Sturdy, smooth, and efficient, that is what Micro Shuttle offers you everytime.</p>
</div>
</div>
</div>
</div-->
	
<!--Right Column-->	
<div class="col-md-4"align="center"> 
      <div class= "bg-light text-dark">
  
    <div class= "panel panel-info">
      <div class= "panel-heading">
        <h4 class= "panel-title"> Call a shuttle </h4>
      </div> 

    <div class= "panel panel-body" id="darshan">
<form id="form1" action="#" method="POST">
    <div class="form-group has-feedback">
    <label for="source">Source:</label>
    <input type="text" class="form-control" id= "source" name="source" list="sourcelist" placeholder="source">
    <datalist id="sourcelist" >
      <option> sjt</option>
      <option> tt</option>
      <option> mb</option>
      <option> cbmr</option>
    </datalist>
    <i class="glyphicon glyphicon-user form-control-feedback"></i>
</div>
  <div class="form-group has-feedback">
    <label for="destination">Destination:</label>
    <input type="text" class="form-control" id="destination" name="destination" list="destinationlist" placeholder="destination">
    <datalist id="destinationlist" >
      <option> sjt</option>
      <option> tt</option>
      <option> mb</option>
      <option> cbmr</option>
    </datalist>
     <i class="glyphicon glyphicon-envelope form-control-feedback"></i>
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
     <div>
     <h5><strong> Payment Mode: </strong></h5>
     <!--div class="form-check">
      <label class="form-check-label" for="cash">
        <input type="radio" class="form-check-input" id="cash" name="credit" value="cash" checked>Cash
      </label>
    </div-->

    <div class="form-check">
      <label class="form-check-label" for="credit">
        <input type="radio" class="form-check-input" id="credit" name="credit" value="credit">Credit
      </label>
    </div>
  </div>

  <button name="add" type="submit" value="add" class="btn btn-primary">Submit</button>
    <button onclick="location.href='user.php'" type="button" class="btn btn-primary" value="exit">
     Exit</button>
  </form>
  </div>
</div>
</div>
</div>
</div>

<?php


function randomName() {
    $names = array(
        'Gangadhar',
        'Raju',
        'Ismail',
        'Sukhpreet',
        'Ramesh',
        'Parshva',
        'Ninad',
        'Darshan',
        'Rushabh',
        'Nipun'
        // and so on

    );
    $random_name = $names[mt_rand(0, sizeof($names) - 1)];
    return $random_name;
}

if(isset($_POST['add']))
{

$fare= 15;
$driver= randomName();
$s= $_POST['source'];
$d= $_POST['destination'];
$m= $_POST['mini'];
$p= $_POST['credit'];
$server="sg2nlmysql1plsk.secureserver.net";
$username="prakhar";
$password="G6q79!6UbvF*p7T_";
$db="safar";
$conn = new mysqli($server,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed".mysqli_connect_error());
}
else
{
/*echo 'successful';
echo $s;
echo $d;
echo $m;
echo $p;
echo $fare;
echo $driver;*/
$user= $_SESSION['logged_user'];
$conn->query ("INSERT INTO ride_details(cid,source,destination,p_mode,c_type,fare,dname,ride_time) VALUES ('$user','$s','$d','$p','$m','$fare','$driver',CURRENT_TIMESTAMP())");
$conn->query ("UPDATE customer SET amount=amount-'$fare' WHERE customer.cid='$user'");
mysqli_close($conn);
  echo '<script type="text/javascript">
        window.location="first_page.php";
      </script>'; 
unset ($_POST['add']);
}
}
 ?>
</body>
</html>