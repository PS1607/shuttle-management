<html>
<head>
<style>
.d2
{
padding:100px;
background-color:white;
border:1px solid rgb(230,230,230);
cursor:pointer;
line-height:25px;
width:1000px;
height:500px;
margin-left:auto;
margin-right:auto;
opacity:0.9;

color:black;
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
margin-top: -20px;
width:100%;
height:10%;
font-size:50px;
color:#0F387D;
}
#card
{
float: left;
margin-left: 40px;
width:40%;
height:200px;
border:5px solid blue
}
#card1
{
float: right;
margin-right: 40px;
width:40%;
height:200px;
border:5px solid blue
}
.i2{
  color: #0F387D
}
#txt1{
    float: left;
    margin-left: 180px;
    font-size: 20px;
}
#txt2{
    float: right;
    margin-right: 200px;
    font-size: 20px;
}

</style>
<body>
  <br>
  <div id="c1" ><center><b>Payment Gateway </b></center>
  </div>
    <div class="d2">
      <div class ="i2" ><center><h2>Choose a Payment Method </h2></center> </div>
        <div>
            
                <img id="card" src="images/cards.jpg">
            </a>

            <a href=>
            <img id="card1" src="images/paypal.jpg">
            </a>
        </div>
        <br>
        <br>
        <div class="text">
            <?php 
                 $id = $_GET['pid'];
                 echo "<a href='payment_back.php?pid=".$id."' id=\"txt1\">Net Banking </a>";

            ?>
        
        <a href="https://www.sandbox.paypal.com/us/signin" id="txt2"> PayPal </a>
        </div>
    </div>
</body>
</head>
</html>

