<?php  require_once('Connection/DB_Connection_Details.php'); ?>
<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" href="bus.png" type="image/icon type">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2018.css">


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
    
<body>
<style>
@import url("https://fonts.googleapis.com/css?family=Fira+Sans");
html{
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Fira Sans", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
body {
  min-height: 100vh;
  display: flex;
  background-image: url("background.jpg");
  background-repeat: no-repeat;
  background-size: 100%;
  align-items: center;
  justify-content: center;
  font-family: "Fira Sans", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  
}
.Heading {
	position: absolute;
	top: 10%;
	transform: translate(0, -50%);
	padding: 10px;
} 
navbar {
	
}
.form-structor {
  background-color: #222;
  border-radius: 15px;
  height: 550px;
  width: 350px;
  position: relative;
  overflow: hidden;
}
.form-structor::after {
  content: '';
  opacity: 0.8;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-repeat: no-repeat;
  background-position: left bottom;
  background-size: 500px;
  background-image: linear-gradient(#b5149a, #1163c9);
  /*background-image: url('https://images.unsplash.com/photo-1503602642458-232111445657?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bf884ad570b50659c5fa2dc2cfb20ecf&auto=format&fit=crop&w=1000&q=100');*/
}
.form-structor .signup {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  width: 65%;
  z-index: 5;
  -webkit-transition: all 0.3s ease;
}
.form-structor .signup.slide-up {
  top: 5%;
  -webkit-transform: translate(-50%, 0%);
  -webkit-transition: all 0.3s ease;
}
.form-structor .signup.slide-up .form-holder, .form-structor .signup.slide-up .submit-btn {
  opacity: 0;
  visibility: hidden;
}
.form-structor .signup.slide-up .form-title {
  font-size: 1em;
  cursor: pointer;
}
.form-structor .signup.slide-up .form-title span {
  margin-right: 5px;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .signup .form-title {
  color: #fff;
  font-size: 1.7em;
  text-align: center;
}
.form-structor .signup .form-title span {
  color: rgba(0, 0, 0, 0.4);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: all 0.3s ease;
}
.form-structor .signup .form-holder {
  border-radius: 15px;
  background-color: #fff;
  overflow: hidden;
  margin-top: 50px;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .signup .form-holder .input {
  border: 0;
  outline: none;
  box-shadow: none;
  display: block;
  height: 40px;
  line-height: 30px;
  padding: 8px 15px;
  border-bottom: 1px solid #eee;
  width: 100%;
  font-size: 14px;
}
.form-structor .signup .form-holder .input:last-child {
  border-bottom: 0;
}
.form-structor .signup .form-holder .input::-webkit-input-placeholder {
  color: rgba(0, 0, 0, 0.6);
}
.form-structor .signup .submit-btn {
  background-color: white;
  /*background-color: rgba(0, 0, 0, 0.4);*/
  color: black;
  /*color: rgba(255, 255, 255, 0.7);*/
  border: 0;
  border-radius: 15px;
  display: block;
  margin: 15px auto;
  padding: 15px 45px;
  width: 100%;
  font-size: 13px;
  font-weight: bold;
  cursor: pointer;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .signup .submit-btn:hover {
  transition: all 0.3s ease;
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
}
.form-structor .login {
  position: absolute;
  top: 20%;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #fff;
  z-index: 5;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login::before {
  content: '';
  position: absolute;
  left: 50%;
  top: -20px;
  -webkit-transform: translate(-50%, 0);
  background-color: #fff;
  width: 200%;
  height: 250px;
  border-radius: 50%;
  z-index: 4;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center {
  position: absolute;
  top: calc(50% - 10%);
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  width: 65%;
  z-index: 5;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center .form-title {
  color: #000;
  font-size: 1.7em;
  text-align: center;
}
.form-structor .login .center .form-title span {
  color: rgba(0, 0, 0, 0.4);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center .form-holder {
  border-radius: 15px;
  background-color: #fff;
  border: 1px solid #eee;
  overflow: hidden;
  margin-top: 50px;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center .form-holder .input {
  border: 0;
  outline: none;
  box-shadow: none;
  display: block;
  height: 40px;
  line-height: 30px;
  padding: 8px 15px;
  border-bottom: 1px solid #eee;
  width: 100%;
  font-size: 14px;
}
.form-structor .login .center .form-holder .input:last-child {
  border-bottom: 0;
}
.form-structor .login .center .form-holder .input::-webkit-input-placeholder {
  color: rgba(0, 0, 0, 0.6);
}
.form-structor .login .center .submit-btn {
  background-color: #000000;
  color: rgba(255, 255, 255, 0.7);
  border: 0;
  border-radius: 15px;
  display: block;
  margin: 15px auto;
  padding: 15px 45px;
  width: 100%;
  font-size: 13px;
  font-weight: bold;
  cursor: pointer;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center .submit-btn:hover {
  transition: all 0.3s ease;
  background-color: rgba(133, 183, 218, 1);
  color: black;
}
.form-structor .login.slide-up {
  top: 90%;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login.slide-up .center {
  top: 10%;
  -webkit-transform: translate(-50%, 0%);
  -webkit-transition: all 0.3s ease;
}
.form-structor .login.slide-up .form-holder, .form-structor .login.slide-up .submit-btn {
  opacity: 0;
  visibility: hidden;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login.slide-up .form-title {
  font-size: 1em;
  margin: 0;
  padding: 0;
  cursor: pointer;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login.slide-up .form-title span {
  margin-right: 5px;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}

/* The navigation bar */
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
#logo{
  border-radius: 5%;
}	
</style>

    
    
<!--navbar-->
    
    <div class="navbar">
      <a href="index.php">Home</a>
      <a href="about.html">About</a>
      <a href="feedback.php">Feedback</a>
	  <a href="mailto:prakharsharma1607@gmail.com">Contact Us</a>
    </div>

<!--end of navbar -->
<div class="Heading">
	<h1 style="color: #FFFFFF"><img id="logo" src="bus.gif" alt="bus logo" height="50px" width="100px"> Shuttle Management System</h1>   
</div>
<div class="form-structor"><br>
	<div class="signup">
		<h2 class="form-title" id="signup"><span>or</span>SIGN UP</h2>
		<form id="form1">
			<div class="form-holder">
				    <input type="text" class="input" id="name" name="name" placeholder="Name"/>
					<input type="text" class="input" name="reg_no" id= "reg_no" placeholder="Registration No." required pattern="[0-9]{2}[A-Z]{3}[0-9]{4}" />
					<input type="email" class="input" id="email" name="email" placeholder="VIT Email-ID" required pattern=".+@vitstudent.ac.in" />
					<input type="Password" class="input" id="password" name="password" placeholder="Password">
					<!--input type="text" class="input" placeholder="Name" />
					<input type="email" class="input" placeholder="Email" />
					<input type="password" class="input" placeholder="Password" /-->
				<!--button class="submit-btn" onclick="display()" type="submit" value="add"  name="add">Sign up</button-->
			 </div>   
			<button class="submit-btn" type="submit" value="add" formmethod="post" formaction="#myModal1" name="add">Sign up</button>
		
		</form>
        <!--button name="add" type="submit" value="add" class="sumbit-btn" onclick="display()">Sign Up</button-->
	</div>
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>LOG IN</h2>
			<form>
			<div class="form-holder">
				
				<input type="email" class="input" placeholder="Email" id="email1" name="email1"/>
				<input type="password" class="input" placeholder="Password" id="password1" name="password1"/>
				<!--button type="submit" class="submit-btn" name="login" value="login">Log in</button-->

			</div>
			<button type="submit" class="submit-btn" name="login" value="login" formmethod="post" formaction="#">Log in</button>

			</form>
		</div>
	</div>
</div>



<script>

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

loginBtn.addEventListener('click', (e) => {
	let parent = e.target.parentNode.parentNode;
	Array.from(e.target.parentNode.parentNode.classList).find((element) => {
		if(element !== "slide-up") {
			parent.classList.add('slide-up')
		}else{
			signupBtn.parentNode.classList.add('slide-up')
			parent.classList.remove('slide-up')
		}
	});
});

signupBtn.addEventListener('click', (e) => {
	let parent = e.target.parentNode;
	Array.from(e.target.parentNode.classList).find((element) => {
		if(element !== "slide-up") {
			parent.classList.add('slide-up')
		}else{
			loginBtn.parentNode.parentNode.classList.add('slide-up')
			parent.classList.remove('slide-up')
		}
	});
});
</script>

    

<!--PHP-->
    
<?php
if(isset($_POST['add']))
{
$f= $_POST['name'];
$n= $_POST['reg_no'];
$e= $_POST['email'];
$l= $_POST['password'];

	
$sql= "select * from customer1 where registration_no='$n'";
$result=mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($conn->connect_error){
    die("Connection failed".mysqli_connect_error());
}
else
{
	if (mysqli_num_rows($result)==0) {
		$conn->query ("INSERT INTO customer1(name,registration_no,email,password) VALUES ('$f','$n','$e','$l')");
		unset ($_POST['add']);
		echo '<script type="text/javascript">
		alert("Account Created Successfully");
		window.location="index.php";
      </script>';
	}
	else {
		echo '<script type="text/javascript">
		alert("User Already Exists!");
		window.location="index.php";
      </script>';
	}
}
}

if (isset($_POST['login']))
{
$server="sg2nlmysql1plsk.secureserver.net";
$username="prakhar";
$password="G6q79!6UbvF*p7T_";
$db="safar";
$conn = new mysqli($server,$username,$password,$db);
if($conn->connect_error){
    die("Connection failed".mysqli_connect_error());
}
else {
  $u = $_POST["email1"];
  $e = $_POST["password1"];

  $sql= "select * from customer1 where email='$u' AND password='$e' ";
  $result=mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
	
  if (mysqli_num_rows($result)>0)
    {
       $_SESSION['logged_user']= $row['cid'];
       echo '<script type="text/javascript">
		window.location="user.php";
      </script>';
    } 

  else 
    {
        echo '<script type="text/javascript">
		alert("Email or Password Incorrect!")
       window.location="index.php";
      </script>'; 
    }
  unset ($_POST['login']);
}
}

?>
</body>
</html>