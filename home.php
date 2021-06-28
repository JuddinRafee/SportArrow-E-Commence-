<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once('model/database_connection.php');

if ($_SESSION['userId']=="" || $_SESSION['username']=="" || $_SESSION['userFullName']=="")
{	
	session_destroy();
	echo "<script language='JavaScript'>alert('You have to login to access this page.');parent.location.href='login.php';</script>";
}
?>

<html>
<head>
	<title>Sport Arrow</title>
    <link rel="shortcut icon" href="view/images/sportsarrow.ico" >
</head>
<style>

	.nav{
		border-width:1px 0;
		list-style:none;
		margin:0;
		padding:0;
		text-align:center;
		background-color:black;
		pading-top:0.2em;
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
	
	.bg {
		background-image: url("view/images/full.jpg");
		height:80%; 
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	
	.container {
		background-color : yellow;
	}
	
	.container2 {
		background-color : #DCDCDC;
	}
	
	.container3 {
		background-color : #FFFFE0;
	}
	
	h3 {
		padding-top:2em;
		padding-left:10em;
		font-family : arial;
		font-size:25px;
		text-align:justify;
	}
	a,tr,td{
		font-family:Adobe Fan Heiti Std;
		font-size:14px;
		font-weight:bold;
		text-align::center;
		text-decoration:none;
		color : black;
	}
</style>
</head>
<body>
	
    <!-- Top Navbar -->
	<div class="top_nav_left" style="color:white;font-family:arial;padding-left:3.0em;padding-top:0.8em">COUNTRY:MALAYSIA/SINGAPORE/BRUNEI/INDONESIA</div>
    
    <!-- Second Navbar -->
	<br><ul class="nav">
		<div class="top_nav_right">
		<a href="home.php">HOME</a>
		<a href="view/women.php">WOMEN</a>
		<a href="view/men.php">MEN</a>
		<a href="view/contact.php">CONTACT</a>
        <img src="view/images/login.png" style="width:23px;height:20px">Hi, <?php echo $_SESSION['userFullName']; ?>
        <a href="listPay.php"><img src="view/images/checkout2.png" style="width:28px;height:25px"></a>
        <a href="logout.php"><img src="view/images/logout2.png" style="width:22px;height:25px"></a>
		</div>
		<div class="top_nav_leftt">
			<img src="view/images/arrowT (2).png" style="width:130px;height:100px">
		</div>
	</ul><br><br><br><br><br>
    
    <!--Header -->
	<div class="bg"></div>
	
    <!-- Link to another page -->
    <div class=container3>
    <br><br><br>
		<a style="align:center;padding-left:17em;padding-top:30em;"href="view/women.php"><img src="view/images/women.png"  style="width:400px;height:230px"></a><span>
		<a style="align:center;padding-left:5em;" href="view/men.php"><img src="view/images/men.png" style="width:400px;height:230px"></a>
    </span>
    <br><br><br>
    </div>
   	<br><br><br><br><br>
    
    <!-- Brand using table -->
	<center><table style="width:50%">
	<tr>
		<td><center><img src="view/images/adidas.JPG"></center></td>
		<td><center><img src="view/images/asics.JPG"></center></td>
		<td><center><img src="view/images/speedo.JPG"></center></td>
		<td><center><img src="view/images/runningbare.JPG"></center></td>
		<td><center><img src="view/images/wilson.JPG"></center></td>
	</tr>
	<tr>
		<td><center><img src="view/images/puma.JPG"></center></td>
		<td><center><img src="view/images/nike.JPG"></center></td>
		<td><center><img src="view/images/NB.JPG"></center></td>
		<td><center><img src="view/images/underarmour.JPG"></center></td>
		<td><center><img src="view/images/prince.JPG"></center></td>
	</tr>
	</table></center><br><br><br>
    
    <!-- Social Media using Table -->
	<div class=container>
    <br><br><br>
	<table style="width:80%">
		<tr>
			<td><h3>FOLLOW US ON SOCIAL MEDIA<br>TO KEEP BEING UPDATED</h3></td>
			<td><a href="https://www.facebook.com/"><img src="view/images/facebook.png" style="padding-top:3em"></a></td>
			<td><a href="https://www.instagram.com/"><img src="view/images/instagram.png" style="padding-top:3em"></a></td>
				<td><a href="https://www.twitter.com/"><img src="view/images/twitter.png" style="padding-top:3em"></td>
	</tr>
	</table>
	<br><br><br>
	</div>

    
</body>
</html>