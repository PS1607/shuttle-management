<?php require_once('Connection/DB_Connection_Details.php');?>
<?php session_start();
$userid=$_SESSION["logged_user"];
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

<script type="text/javascript">
  function displaydel()
  {
    alert("Account Deleted");
  }
  function displaych()
  {
    alert("Account Modified");
  }
</script>

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
</style>
	
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
      <a href="index.php">Home</a>
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
//$_SESSION['logged_user']=1;
//session_start();

if($conn->connect_error){
    die("Connection failed".mysqli_connect_error());
}
else{ $result= $conn->query ("SELECT * FROM customer1 where cid = '$t'");
  $row = $result->fetch_assoc();
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
	 
  $_SESSION['reg_no'] = $n;

}
?>
<div class= "panel panel-body detail">
      <img id="pholder" class= "center" src="<?php echo "$jpg"; ?>">
      <br>
      <br>
	  
      <table class = "table">
	  <tr>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		  <p align="left"><h4>Change Profile Picture:</h4>
		  <input type="file" name="fileToUpload" id="fileToUpload">
		  <input type="submit" value="Upload Image" name="submit"><br>
      Maximum Upload Size is 5MB
		  </p>
	  	</form>  
	  </tr>
	  
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
         <td align="center">Amount: <?php echo "$g";?></td>
      </tr>
   </table>
   <br>
   <br>
   <div class= "wrapper">
    <form action="delete.php?userid=<?php echo $userid; ?>" method="POST">
   <button name="delete" type="submit" value="delete" class="btn btn-primary" onclick="displaydel()">Delete Account</button>
 </form>
   </div>
      </div>
    </div>
</div>

<?php
if(isset($_POST['delete']))
{
  //session_start();
$t= $_SESSION['logged_user'];
if(!($conn)){
    die("Connection failed".mysqli_connect_error());
}
else
{
echo 'successful';
//$conn->query ("DELETE FROM customer WHERE cid=$t");
$query="DELETE FROM customer1 WHERE cid='$t'";
$res=mysqli_query($conn,$query);
if($res){echo "deleted";}
else{echo "failed";}
unset ($_POST['delete']);
}
}
?>
<div class="col-md-8">
  <div class="panel panel-success">
    <div class="panel-heading" align="center"><h4 class= "panel-title" align="center"> Account Modification Options </h4></div>
    <div class="panel-body log">

<div class= "panel panel-body">
<form id="form1" action="#" method="POST">
  <div class="form-group has-feedback">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id= "email" placeholder="Email">
    </div>
    <div class="form-group has-feedback">
    <label for="newname">New Name</label>
    <input type="text" class="form-control" name="newname" id= "newname" placeholder="New Name">
    </div>
  <div class="form-group has-feedback">
    <label for="newpass">New Password</label>
    <input type="password" class="form-control" id="newpass" name="newpass" placeholder="New Password">
  </div>

  <button name="modify" type="submit" value="modify" class="btn btn-primary" onclick="displaych()">Submit</button>
  <button onclick="location.href='user.php'" type="button" class="btn btn-primary" value="exit">
     Exit</button>
  </form>
</div>

    </div>
  </div>
</div>
</div>

</body>
</html>

<?php
if (isset($_POST['modify']))
{
  //session_start();
  

if($conn->connect_error){
    die("Connection failed".mysqli_connect_error());
}
else {
  $u= $_POST["email"];
  $e= $_POST["newname"];
  $l= $_POST["newpass"];
  $sql1="update customer1 set name='$e', password='$l', email='$u' where cid='$t'";
  //$result1=mysqli_query($conn,$sql1);
  //$row1 = mysqli_fetch_assoc($result1);
  $result1= $conn->query ("update customer1 set name='$e', password='$l', email='$u' where cid='$t'");
  $row1 = $result1->fetch_assoc();
  // if (mysqli_num_rows($result1)>0)
  //   {
  //      $_SESSION['logged_user']= $row1['cid'];
  //      echo 'Success';
  //   } 
  // else 
  //   {
  //       echo 'Fail'; 
  //   }   
  //unset ($_POST['modify']);
}

}



?>
