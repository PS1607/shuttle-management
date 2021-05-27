<html>
<head>
<style>
img
{
width:16px;
height:15px;
}
.d2
{
padding:100px;
background-color:white;
border:1px solid rgb(230,230,230);
cursor:pointer;
line-height:25px;
width:1000px;
height:2000px;
margin-left:auto;
margin-right:auto;
opacity:0.9;
margin-top:0px;
color:black;
background-color:white;
}
body
{
background-image: url("background.jpg");
background-size: 100%;
margin:0;
}
#c1
{
font-size:18px;
font-family:helvetica;
background-color:#e3f2fd;
margin-top:-20;
width:100%;
height:13%;
font-size:50px;
color:#0F387D;
}
#card
{
width:40%;
height:200px;
}
#card1
{
margin:auto;
width:40%;
height:200px;
}
</style>
<body>
<br>
<div id="c1"><center><b>Payment Gateway </b></center></div>
<div class="d2"><div class="i2"><h2>Payment Method </h2></div></br>
<table>
<tr>
<td><img id="card" src="images/cards.jpg">&nbsp;&nbsp;&nbsp;&nbsp;<img id="card1"
src="images/paypal.jpg">
</td>
</tr>
</table>
<input type=radio onclick = "window.location='payment_back.php';" name="r1"
/>Credit Card/Debit Card/Net Banking
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="https://www.sandbox.paypal.com/us/signin">
  <input type="radio" style="pointer-events:none;">Paypal
</a>
<br><br>
</body>
</head>
</html>