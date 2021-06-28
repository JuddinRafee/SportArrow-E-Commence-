<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once('../model/database_connection.php');

if ($_SESSION['userId']=="" || $_SESSION['username']=="" || $_SESSION['userFullName']=="")
{	
	session_destroy();
	echo "<script language='JavaScript'>alert('You have to login to access this page.');parent.location.href='login.php';</script>";
}
?>

<html>
<head>
	<title>Contact Us</title>
    <link rel="shortcut icon" href="images/sportsarrow.ico" >
</head>
<style>


	.top_nav_left{
		background-color:black;
		height : 30px;
	}
	
	.nav{
		border-width:1px 0;
		list-style:none;
		margin:0;
		padding:0;
		text-align:center;
		background-color:black ;
	}
	
	.nav a{
		display:inline-block;
		padding:25px;
		color : black;
		float: center;
		text-align: center;
		font-size: 15px;
		font-family : arial;
		text-decoration:none;
		font-weight:bold;
		
	}
	
	.top_nav_left{
		background-color:black;
		height : 30px;
	}
	
	.top_nav_right {
		padding-right : 5em;
		float: right;
	}
	
	.top_nav_leftt {
		float: left;
		padding-left:5em;
	}
	
	body {
		margin:0 auto;
		padding:0;
	}
	
	
	.footer {
   		position: fixed;
   		left: 0;
   		bottom: 0;
   		width: 100%;
   		background-color: yellow;
   		color: black;
   		text-align: center;
	}
	
	.mapouter{
		text-align:right;
		height:500px;
		width:1000px;
	}
	
	.gmap_canvas {
		overflow:hidden;
		background:none!important;
		height:500px;
		width:1000px;
	}
	
	h2,p {
		font-family : arial;
		text-align:center;
	}
	
	.hr {
		width: 80%;
		height: 1px;
		margin-left: auto;
		margin-right: auto;
		background-color:E8E5E5;
		border: 0 none;

	}
</style>
<body>

	
    
	<div class="top_nav_left" style="color:white;font-family:arial;padding-left:3.0em;padding-top:0.8em">COUNTRY:MALAYSIA/SINGAPORE/BRUNEI/INDONESIA</div>
    
    <br><ul class="nav">
		<div class="top_nav_right">
		<a href="../home.php">HOME</a>
		<a href="women.php">WOMEN</a>
		<a href="men.php">MEN</a>
		<a href="contact.php">CONTACT</a>
        <img src="images/login.png" style="width:23px;height:20px">Hi, <?php echo $_SESSION['userFullName']; ?>
        <a href="../listPay.php"><img src="images/checkout2.png" style="width:28px;height:25px"></a>
        <a href="../logout.php" target="Content"><img src="images/logout2.png" style="width:22px;height:25px"></a>
		</div>
		<div class="top_nav_leftt">
			<img src="images/arrowT (2).png" style="width:130px;height:100px">
		</div>
	</ul><br><br><br><br><br><br><br>
    
	<div class="hr"></div>
    
    <br><br><br>
	<div class="row">
  		<div class="column">
    		<center><div class="mapouter">
    			<div class="gmap_canvas">
        			<iframe width="1000" height="500" id="gmap_canvas" <img src=			"https://maps.google.com/maps?q=uitm%20segamat&t=&z=13&ie=UTF8&iwloc=&output=embed" 
            		frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
            		</iframe><a href="https://www.pureblack.de/webdesign-darmstadt/"></a>
        		</div>
			</div></center>
 		</div>
  		<div class="column">
   			 <h2 style="font-family:Arial;font-size : 35px;">Contact Us</h2>
   			 <p><b>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.</b></p><br>
             <p style="color:gray">Email: admin@sportsarrow.com.my</p>
             <p style="color:gray">Office No : 603-234567</p>
             <br><br>
             <p style="color:gray">Open Hours : 10:00AM - 5:00PM</p>
             <p style="color:gray">Sunday closed</p>
 		</div>
	</div>
  	
    
    <br><br><br><br>
    <div class="footer">
  		<p style="font-weight:bold;">&copy; 2018 - Sports Arrow</p>
	</div>
   
</body>
</html>