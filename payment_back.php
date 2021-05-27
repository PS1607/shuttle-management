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
<?php require_once('Connection/DB_Connection_Way2.php'); ?>


<html>
<head>
<title>Payment Portal</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Oxygen&display=swap');
body {
  user-select: none;
  margin: 0;
  padding:0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 110vh;
  width: 100vw;
  overflow-x: hidden;
  box-sizing: border-box;
  font-family: 'Oxygen', sans-serif;
  background-image: url("background.jpg");
    background-size: 100%;
	background-repeat: no-repeat;
}
h {
  font-size: 0.9em;
  padding: 10px;
  color: #1f1f1f;
  text-transform: uppercase;
}
p {
  color: white;
  font-size: 1em;
  font-weight: 600;
  letter-spacing: 5px;
  margin:0;
}
.card-wrapper {
  height: 480px;
  width: 400px;
  margin-top: 100px;
  display: flex;
  flex-direction: column;
  align-items: center;
  border-radius: 20px;
  border: 1px solid #C0C0C0;
  background: white;
}
.card {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 200px;
  width: 300px;
  margin-top: -80px;
  padding: 10px;
  border-radius: 20px;
  border: 1px solid black;
  background-image: url('https://images.wallpaperscraft.com/image/stains_paint_liquid_144876_3840x2400.jpg');
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
   box-shadow: 10px 10px 30px #250f10,
             -10px -10px 30px #331516;
  transition: all .4s ease;
}
.card:hover {
  transform: scale(1.1);
}
.card-header, .card-number, .card-bottom {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  height: 50px;
  width: 100%;
  transition: all .4s ease;
}
.card-number {
  justify-content: center; 
  margin: 10px 0px 10px 0px;
  border-radius: 5px;
  width: 90%;
  transition: all .4s ease;
}

#chip {
  height: 80px;
  width: 80px;
  border-radius: 15px;
  margin: 10px;
}
#logo {
  height: 80px;
  width: 90px;
  margin: 10px;
  border-radius: 15px;
}
#p-card-number, #card-name, #card-cvv, #card-month, #card-year
{
  color: #f1f1f1;
  font-size: 1em;
  text-transform: uppercase;
  font-weight: 600;
  trasition: all .4s ease;
}
.card-name-wrapper, .cvv-wrapper {
  display: flex;
  justify-content: center;
  max-width: 70%;
  border-radius: 5px;
  padding:0;
  transition: all .4s ease;
}
.date-wrapper {
  width: 30%;
  height: 60%;
  display: flex;
  flex-directiom: row;
  justify-content: space-around;
  border-radius: 5px;
  transition: all .4s ease;
}

#card-name::before {
  display: block;
  content: "cardholder";
  font-size: 0.7em;
  letter-spacing: normal;
  color: lightgrey;
}
.form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 350px;
  border-left: 1px solid #C0C0C0;
  border-right: 1px solid #C0C0C0;
  border-bottom: 1px solid #C0C0C0;
  border-radius: 15px;
}
.heading {
  width: 90%; 
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.form-card-number , .form-card-holder, .form-bottom{
  height: 50px;
  width: 90%;
  border-radius: 5px;
  border: 1px solid #C0C0C0;
}
.form-bottom {
  flex-direction: row;
  justify-content: space-between;
  border: none;
}
.form-submit {
  height: 100px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
#month, #year {
  width: 20%;
  border: 1px solid #C0C0C0;
  margin: 0px 10px 0px 10px;
}
#submit {
  height: 40px;
  width: 180px;
  border-radius: 5px;
  margin: 30px;
  border: none;
  outline: none;
  color: white;
  font-size: 0.9em;
  text-transform: uppercase;
  background: #03A9F4;
}
input {
  height: 45px;
  width: 95%;
  outline: none;
  background: none;
  border: none;
  border-radius: 5px;
  font-size: 1em;
}
#date {
  width: 40%;
}
#input-cvv {
  border: 1px solid #C0C0C0;
  width: 30%;
  float: right;
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
	  <a href="index.php">Logout</a>
    </div>

<!--end of navbar -->	
<form id="form1" action="#" method="POST">
	<div class="card-wrapper">
  <div class="card">
    <div class="card-header">
      <img src="images/chip.png" id="chip" height="100px">
      <img src="images/visa.png" id="logo">
    </div>
    <div class="card-number">
      <p id="p-card-number">
        #### #### #### ####
      </p>
    </div>
    <div class="card-bottom">
      <div class="card-name-wrapper">
        
      <p id="card-name"></p> 
      </div>
      <div class="date-wrapper">
        
          <p id="card-month"></p>
        <p>/</p>
        <p id="card-year"></p>
        
      </div>
    </div>
  </div>
  <div class="form">
    <div class="heading">
      <h>card number</h>
    </div>
    <div class="form-card-number">
      <input type="number" id="input-number" oninput="cardnum()" onfocus="numdeco()" onblur="numnodeco()"/>
     </div>
    <div class="heading"><h>card holder</h></div>
    <div class="form-card-holder">
      <input type="text" id="input-name" oninput="cardname()" onfocus="namedeco()" onblur="namenodeco()"/>
    </div>
    <div class="heading"><h>expiration date</h> <h>cvv</h></div>
    <div class="form-bottom">
      <input type="number" id="month"/ oninput="cardmonth()" min="1" max="12" placeholder=" month" onfocus="expdeco()" onblur="expnodeco()">
      <input type="number" id="year" oninput="cardyear()" onfocus="expdeco()" onblur=
"expnodeco()" placeholder=" year"/>
      <input type="number" id="input-cvv" min="100" max="999" oninput="cardcvv()"/>
    </div>
    <div class="form-submit">
    <button name="submit" type="submit" value="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
</form>

<script>
	//inspired by https://codepen.io/JavaScriptJunkie/details/YzzNGeR

//display white border and grey bg when element is active

var namewrapper = document.querySelector(".card-name-wrapper");
var numwrapper = document.querySelector(".card-number");
var datewrapper = document.querySelector(".date-wrapper");

function numdeco()
{
  numwrapper.style.border = "2px solid white";
  numwrapper.style.background = "rgba(100, 100, 100, 0.5)";
}

function numnodeco()
{
  numwrapper.style.border = "none";
  numwrapper.style.background = "none";
}

function namedeco()
{
  namewrapper.style.border = "2px solid white";
  namewrapper.style.background = "rgba(100, 100, 100, 0.5)";
}

function namenodeco()
{
  namewrapper.style.border = "none";
  namewrapper.style.background = "none";
}

function expdeco()
{
  datewrapper.style.border = "2px solid white";
  datewrapper.style.background = "rgba(100, 100, 100, 0.5)";
}

function expnodeco()
{
  datewrapper.style.border = "none";
  datewrapper.style.background = "none";
}

//display user input onto card

function cardnum() {
  var divnum = document.querySelector("#p-card-number");
  var inputnum = document.querySelector("#input-number").value;
  
  var validinput = inputnum.substring(0, 15);
  divnum.innerHTML = validinput;
}

function cardname() {
  var divname = document.querySelector("#card-name");

  var inputname = document.querySelector("#input-name").value;

  var validinput = inputname.substring(0, 22);

  divname.innerHTML = validinput;
}
/*
function cardcvv() {
  var divcvv = document.querySelector("#card-cvv");

  var inputcvv = document.querySelector("#input-cvv").value;

  var validinput = inputcvv.substring(0, 3);
  
  divcvv.innerHTML = validinput;
  }
*/

function cardmonth() {
  var month = document.querySelector("#month").value;

  var monthdiv = document.querySelector("#card-month");

  if (month <= 12) {
    monthdiv.innerHTML = month;
  } else {
    monthdiv.innerHTML = "mm";
  }
}
function cardyear() {
  var year = document.querySelector("#year").value;

  var yeardiv = document.querySelector("#card-year");

  if (year.length == 4) {
    yeardiv.innerHTML = year;
  } else {
    yeardiv.innerHTML = "yy";
  }
}

</script>
</body>
</html>

<?php
  $id = $_GET['pid'];
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

  //echo $id."<br>";
  //echo $shutid."<br>";
  //echo $arrival."<br>";
  //echo $departure."<br>";
  //echo $s."<br>";

  /*echo "<table id=\"list\" style=\"width: 80%; margin-left: auto; margin-right: auto;\">
    <caption>Available Shuttles</caption>

  <tr>
    <th>Shuttle ID</th>
    <th>Source</th>
    <th>Destination</th>
    <th>Arrival</th>
    <th>Departure</th>
  </tr>";

  echo "<tr>";
          echo "<td>".$shutid."</td>";
          echo "<td>".$s."</td>";
          echo "<td>".$d."</td>";
          echo "<td>".$arrival."</td>";
          echo "<td>".$departure."</td>";
        echo "</tr>";
  echo "</table>";*/


if(isset($_POST['submit'])){

  $now=date('H:i:s');
  if($t!=0){
    $sql_url1 = "INSERT INTO booking_details (cid, shut_id, source, destination, fare, ride_time)
              VALUES ('$t', '$shutid', '$s', '$d', '15', '$arrival');"; 
    if ($conn->query($sql_url1) === TRUE) {
    echo '<script type="text/javascript">
          alert("Seat Booked")
          window.location="user.php";
          </script>'; 
    } 
    else {
        echo "Error: " . $sql_url1 . "<br>" . $conn->error;
    }
  }
  
}




?>