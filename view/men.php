<html>
<head>
	<title>Men's</title>
    <link rel="shortcut icon" href="images/sportsarrow.ico" >
</head>
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once('../model/product_class.php');
require_once('../model/database_connection.php');

if ($_SESSION['userId']=="" || $_SESSION['username']=="" || $_SESSION['userFullName']=="")
{	
	session_destroy();
	echo "<script language='JavaScript'>alert('You have to login to access this page.');parent.location.href='login.php';</script>";
}

//object declaration
$Product = new Product();

$userNp=$_SESSION['username'];
$productAttireM = $Product->getAttireList('M');
$productShoesM = $Product->getShoesList('M');
$productAcceM = $Product->getAcceList('M');
?>

<style>


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
		font-weight:bold;
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
	
	.columnL {
  		float: left;
    	width: 30%;
    	padding: 10px;
	}
	
	.columnR {
  		float: left;
    	width: 65%;
    	padding: 10px;
	}

	.row:after {
    	content: "";
    	display: table;
    	clear: both;
	}
	
	.card {
   		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    	transition: 0.3s;
    	width: 220px;;
	}

	.card:hover {
   		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
	}

	.container {
    	padding: 1px 16px;
	}
	
	.columnP {
    	float: left;
    	width: 32%;

	}
	
	.rowP::after {
    	content: "";
    	clear: both;
    	display: table;
	}
	
	.btn {
    	border: none;
    	background-color: inherit;
    	padding: 10px 18px;
    	font-size: 16px;
   		cursor: pointer;
    	display: inline-block;
	}
	
	.btn1 {
    	border: none;
    	background-color: inherit;
    	padding: 10px 12px;
    	font-size: 16px;
   		cursor: pointer;
    	display: inline-block;
	}
	
	.default {color: gray;}
	
	a,k,p{
		font-family:Adobe Fan Heiti Std;
		font-size:14px;
		font-weight:bold;
		text-align::center;
		text-decoration:none;
		color : black;
	}
		
	
	h4 {
		font-family:arial;
		color:white;
		font-size:15px;
		font-weight:bold;
		background-color:black;
	}
	
	h3 {
		background-image:url("images/white2.png");
		width:860px;
		font-family:Arial;
		font-size:24px;
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
	
	input[type=text] {
  		float: right;
  		padding: 6px;
		padding-left:7.5em;
 		border: 1px solid black;
  		font-size: 14px;

	}
	
	form.search input[type=text] {
    	padding: 6.5px;
    	font-size: 15px;
    	border: 1px solid grey;
    	float: left;
    	width: 60%;
    	background: #f1f1f1;
	}

	form.search button {
    	float: left;
    	width: 30%;
    	padding: 6.5px;
    	background: #2196F3;
		color: white;
		font-size: 15px;
		border: 1px solid grey;
		border-left: none;
		cursor: pointer;
	}
	
	form.example button:hover {
		background: #0b7dda;
	}
	
	form.search::after {
		content: "";
		clear: both;
		display: table;
	}
	
	#myBtn {
	  display: none;
	  position: fixed;
	  bottom: 70px;
	  right:-243px;
	  z-index: 99;
	  color: white;
	  cursor: pointer;
	  background-color:transparent;
	  border:none;
	}
	
	
</style>
<body>

	<button onClick="topFunction()" id="myBtn" title="Go to top"><img src="images/top.png" style="width:8%;height:8%"></button>
	
	<div class="top_nav_left" style="color:white;font-family:arial;padding-left:3.0em;padding-top:0.8em">COUNTRY:MALAYSIA/SINGAPORE/BRUNEI/INDONESIA</div>
    
    <br><ul class="nav">
		<div class="top_nav_right">
		<a href="../home.php">HOME</a>
		<a href="women.php">WOMEN</a>
		<a href="men.php">MEN</a>
		<a href="contact.php">CONTACT</a>
        <img src="images/login.png" style="width:23px;height:20px">Hi, <?php echo $_SESSION['userFullName']; ?>
        <a href="../listPay.php"><img src="images/checkout2.png" style="width:28px;height:25px"></a>
        <a href="../logout.php"><img src="images/logout2.png" style="width:22px;height:25px"></a>
		</div>
		<div class="top_nav_leftt">
			<img src="images/arrowT (2).png" style="width:130px;height:100px">
		</div>
	</ul><br><br><br><br><br><br>

    <img src="images/headerM.png"style="width:50%;height:500px;" ><img src="images/headerM4.png"style="width:50%;height:500px;" >
    <div class="row">
  		<div class="columnL" style="background-color:white ;">
    		<div class = "link" >
            <h5 style ="color : black; font-family:calibri;text-decoration:none;padding-left:8em; font-size:15px">Men's</h5>
				<a style ="color : black; font-family:calibri;text-decoration:none;padding-left:10em;" href="#attires">Attires</a>				
                <br>
				<a style ="color : black; font-family:calibri;text-decoration:none;padding-left:10em;" href="#shoes">Shoes</a><br>
				<a style ="color : black;font-family:calibri;text-decoration:none;padding-left:10em;" href="#accessories">Accessories</a>
			</div>
            
        <br><br>
 		</div>
        
 		<div class="columnR" style="background-color:white;">
        	<section id="attires">
            <center><h3>ATTIRES</h3></center><br><br>
            <!--TOPS-->
            <div class="rowP">
            	<?php
				$i = 1;
				if($productAttireM)
				{	
	 				foreach($productAttireM as $row)
	  				{	
	  					$attId = $row ['attId'];
	  					$attBrands = $row ['attBrands'];
	 					$attName = $row ['attName'];
						$attSize = $row ['attSize'];
						$attPrice = $row ['attPrice'];
						$attGender = $row ['attGender'];
						$category = $row ['category_product'];
	   					?>
       					<div class="columnP">
   							<div class="card">
       							<a href="singleProduct.php?id=<?php echo $attId?>&cat=<?php echo $category?>"><?php $Product->displayA($attId); ?>
      							<div class="container">
       								<center><h4><?php echo $attBrands; ?></h4> 
       								<p><?php echo $attName; ?></p></a>
       								<k>RM<?php echo $attPrice; ?></k></center>
								</div>
  							</div>
                         </div>
       					<?php
	  					if($i%3==0)
	   					{
		   				?></div>
                        <br><br>
                        <div class="rowP">
       					<?php	
	   					} 
						$i++;
					}
				}
				?>
            </div>
            </section><br><br>
            
            <section id="shoes">
            <center><h3>SHOES</h3></center><br><br>
            <!--PERFORMANCE-->
            <div class="rowP">
            	<?php
				$i = 1;
				if($productShoesM)
				{	
	 				foreach($productShoesM as $row)
	  				{	
	  					$shoesId = $row ['shoesId'];
	  					$shoesBrand = $row ['shoesBrand'];
	 					$shoesName = $row ['shoesName'];
						$shoesSize = $row ['shoesSize'];
						$shoesPrice = $row ['shoesPrice'];
						$shoesGender = $row ['shoesGender'];
						$category = $row ['category_product'];
	   					?>
       					<div class="columnP">
   							<div class="card">
       							<a href="singleProduct.php?id=<?php echo $shoesId?>&cat=<?php echo $category?>"><?php $Product->displayB($shoesId); ?>
      							<div class="container">
       								<center><h4><?php echo $shoesBrand; ?></h4> 
       								<p><?php echo $shoesName; ?></p></a>
       								<k>RM<?php echo $shoesPrice; ?></k></center>
								</div>
  							</div>
                   		</div>
       					<?php
	  					if($i%3==0)
	   					{
		   					?></div>
                       		<br><br>
                       		<div class="rowP">
       					<?php	
	   					} 
						$i++;
					}
				}
				?>
         	</div>
          	</section><br><br>
            
          	<section id="accessories">
         	 <center><h3>ACCESSORIES</h3></center><br><br>
            <!--BAGS-->
            <div class="rowP">
            <?php
			$i = 1;
				if($productAcceM)
				{	
	 				foreach($productAcceM as $row)
	  				{	
	  					$accId = $row ['accId'];
	  					$accBrands = $row ['accBrands'];
	 					$accName = $row ['accName'];
						$accSize = $row ['accSize'];
						$accPrice = $row ['accPrice'];
						$accGender = $row ['accGender'];
						$category = $row ['category_product'];
	   					?>
       					<div class="columnP">
   							<div class="card">
       							<a href="singleProduct.php?id=<?php echo $accId?>&cat=<?php echo $category?>"><?php $Product->displayC($accId); ?>
      							<div class="container">
       								<center><h4><?php echo $accBrands; ?></h4> 
       								<p><?php echo $accName; ?></p></a>
       								<k>RM<?php echo $accPrice; ?></k></center>
								</div>
  							</div>
                         </div>
       					<?php
	  					if($i%3==0)
	   					{
		   				?></div>
                        <br><br>
                        <div class="rowP">
       					<?php	
	   					} 
						$i++;
					}
				}
				?>
          </div>
          </section>
 	 	</div>
	</div><br><br><br>
    
    <div class="footer">
  		<p>&copy; 2018 - Sports Arrow</p>
	</div>
    
    <script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};
	
	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("myBtn").style.display = "block";
		} else {
			document.getElementById("myBtn").style.display = "none";
		}
	}
	
	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
	</script>
    
</body>


</html>