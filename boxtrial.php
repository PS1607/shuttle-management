<?php session_start(); ?>
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
body{
  background-image: url("background.jpg");
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: center;
}


.outerclass{
  background-color: white;
  padding: 20px;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
}
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

.box1{
    width: 30%;
    border: 1px solid #1C6EA4;
    padding: 20px;
    margin-left: auto;
    margin-right: auto;
}
.title-div{
    align: center
}

.formclass {
  height: 50px;
  width: 350px;

  margin-left: auto;
  margin-right: auto;

}

#form1{
    border: 4px solid #1C6EA4;
    padding: 10px;
    
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
  background: #F51945;
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
.panel-info>.panel-heading {
	color: #006b6b;
	background-color: #91c7c7;
	border-color: #009ab9;   
}
</style>

<body>
<!--navbar-->
    
<div class="navbar">
      <a href="user.php">Home</a>
      <a href="about.html">About</a>
      <a href="feedback.php">Feedback</a>
	  <a href="mailto:prakharsharma1607@gmail.com">Contact Us</a>
	  <a href="logout.php">Logout</a>
</div>


	
   <br><br><br><br>	
<div class="outerclass">
  <h2><center>Call a shuttle</center></h2>
      <div class= "formclass">
        <form id="form1" action="#" method="POST">
        
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
            <br>

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

  <br><br><br><br><br>
  <div class="availab">
    <br><br>
    <h1><center>AVAILABLE SHUTTLES </center></h1><br>
    
    <div class ="box1" position: center>
          <div class="title-div">  
              <h2 class="shuttle-id">
              SH1003
              </h2>
              Driver Name: 
          </div>
      <table class="blueTable">
          <thead>
          <tr>
          <th>ETA</th>
          <th>VACANCY</th>
          <th>PICKUP POINT</th>
          </tr>
          </thead>
          <tbody>
          <tr>
          <td>3:00 PM</td><td>4</td><td>TT</td></tr>
          </tbody>
          </tr>
      </table>
      <br>
      <a class="myButton"> BOOK </a>
    </div>
  </div>
</div>


</body>
</html>