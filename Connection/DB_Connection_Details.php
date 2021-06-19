<?php
$server="";
$username="";
$password="";
$db="";
$t= $_SESSION['logged_user'];
$conn = new mysqli($server,$username,$password,$db);

$con=mysqli_connect("$server", "$username", "$password", "$db");
?>

