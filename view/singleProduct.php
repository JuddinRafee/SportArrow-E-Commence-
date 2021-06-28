<html>
<head>
	<title>Product</title>
	<link rel="shortcut icon" href="images/sportsarrow.ico" >
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once('../model/product_class.php');

if ($_SESSION['userId']=="" || $_SESSION['username']=="" || $_SESSION['userFullName']=="")
{	
	session_destroy();
	echo "<script language='JavaScript'>alert('You have to login to access this page.');parent.location.href='login.php';</script>";
}


//object declaration
$Product = new Product();

$productId=$_GET['id'];
$productCat=$_GET['cat'];
$userNp=$_SESSION['username'];

if($productCat=="A1")
{
	$singleProduct = $Product->getProductA($productId, $productCat);
	if($singleProduct)
	{	
		foreach($singleProduct as $row)
		{	
			$productId = $row ['attId'];
	  		$productBrand = $row ['attBrands'];
	 		$productName = $row ['attName'];
			$productSize = $row ['attSize'];
			$productPrice = $row ['attPrice'];
			$productCat = $row ['category_product'];
		}
	}
}

else if($productCat=="B1")
{
	$singleProduct = $Product->getProductB($productId, $productCat);
	if($singleProduct)
	{	
		foreach($singleProduct as $row)
		{	
			$productId = $row ['shoesId'];
	  		$productBrand = $row ['shoesBrand'];
	 		$productName = $row ['shoesName'];
			$productSize = $row ['shoesSize'];
			$productPrice = $row ['shoesPrice'];
			$productGender = $row ['shoesGender'];
			$productCat = $row ['category_product'];
		}
	}
}
else
{
	$singleProduct = $Product->getProductC($productId, $productCat);
	if($singleProduct)
	{	
		foreach($singleProduct as $row)
		{	
			$productId = $row ['accId'];
	  		$productBrand = $row ['accBrands'];
	 		$productName = $row ['accName'];
			$productSize = $row ['accSize'];
			$productPrice = $row ['accPrice'];
			$productGender = $row ['accGender'];
			$productCat = $row ['category_product'];
		}
	}
}
?>
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
		background-color:black;
		pading-top:0.2em;
		font-weight:bold;
		
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
	
	.column1 {
    	float: left;
    	width:	500px;

	}
	
	.column2 {
    	float: left;
    	width: 200px;

	}
	
	

	.row:after {
    	content: "";
    	display: table;
    	clear: both;
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
	
	.default {color: gray; font-size:15px}
	
	p,k{
		font-family:Arial;
		font-size:14px;

	}
	
	h2 {
		font-family:Adobe Fan Heiti Std;
		font-size:28px;
		font-weight:bold;
	}
	
	h4 {
		font-family:arial;
		color:gray;
		font-size:20px;
		font-weight:bold;
	}
	
	.card {
  		box-shadow: 0 20px 8px 0 rgba(0, 0, 0, 0.2);
 		max-width: 300px;
  		margin: auto;
		position:center;
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
	
	.hr {
		width: 80%;
		height: 1px;
		margin-left: auto;
		margin-right: auto;
		background-color:E8E5E5;
		border: 0 none;

	}




</style>
<script language="JavaScript" type="text/javascript" src="js/cart.js"></script>
</head>

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
        <a href="../logout.php"><img src="images/logout2.png" style="width:22px;height:25px"></a>
		</div>
		</div>
		<div class="top_nav_leftt">
			<img src="images/arrowT (2).png" style="width:130px;height:100px">
		</div>
	</ul><br><br><br><br><br><br>

	<div class="hr"></div>
	<div class="row">
  			<div class="column1" style="padding-left:17em;">
    			<div class="card" style="padding-top:3em;">
                <?php
					if($productCat=='A1')
					{?>
 					<center><?php $Product->displayA($productId); ?></center>
                    <?php
					}
					else if($productCat=='B1')
					{?>
 					<center><?php $Product->displayB($productId); ?></center>
                    <?php
					}
					else 
					{?>
 					<center><?php $Product->displayC($productId); ?></center>
                    <?php
					}?>
        		</div>
  			</div>
  			<div class="column2">
            	<form name="formCart" method="post">
   				 <h4><?php echo $productBrand;?></h4>
                 <input type="hidden" id="prodBrand" name="prodBrand" value="<?php echo $productBrand;?>"/>
                 <input type="hidden" id="prodId" name="prodId" value="<?php echo $productId;?>"/>
                 <input type="hidden" id="prodCat" name="prodCat" value="<?php echo $productCat;?>"/>
                 
   				 <h2><?php echo $productName;?></h2>
                 <input type="hidden" id="prodName" name="prodName" value="<?php echo $productName;?>"/>
                 <?php
				 	if($productCat=='A1')
					{
						?>
						<p>Size :
              				<input id="s" type="radio" name="size" value="S"><label for="s">S</label>
                   			<input id="m" type="radio" name="size" value="M"><label for="m">M</label>
                   			<input id="L" type="radio" name="size" value="L"><label for="l">L</label><br>
             	 		</p>
                 		<?php
					}
					
					else if($productCat=='B1')
					{
						if($productGender=='M')
						{
							?>
							<p>Size :
              					<input id="40" type="radio" name="size" value="40"><label for="40">40</label>
                    			<input id="41" type="radio" name="size" value="41"><label for="41">41</label>
                   				<input id="42" type="radio" name="size" value="42"><label for="42">42</label><br>
             	 			</p>
                 			<?php
						}
						else
						{
							?>
							<p>Size :
              					<input id="37" type="radio" name="size" value="37"><label for="37">37</label>
                    			<input id="38" type="radio" name="size" value="38"><label for="38">38</label>
                    			<input id="39" type="radio" name="size" value="39"><label for="39">39</label><br>
             	 </p>
                 			<?php
						}
					}
					else
					{
						?>
						<p>Size :
              				<input id="freesize" type="radio" name="size" value="FREE SIZE"><label for="freesize">FREE SIZE</label><br></p>
                   		<?php
                    }
				?>
                 
                 <div id="quantity">
                 <k>RM<?php echo $productPrice;?></k>
                 <input type="hidden" id="prodPrice" name="prodPrice" value="<?php echo $productPrice;?>"/>
                 <br><br>
                 Quantity : <input  style="width:30px" type="number" id="1"  value="1" min="1" max="20" name="quantity"/>
							</div><br>
              	 <!--<button onClick="saveProduct(addToCart)"><img src="images/addToCart.png"  style="width:200px;height:30px;padding-right:0.5em;"></button>-->
                 <input type="button"  name="saveCart" id="saveCart" value="Add to Cart" onClick="product('addToCart');" />
                 </form> 
 			 </div>
	</div>
    
	<br><br><br>
    
    <div class="footer">
  		<p>&copy; 2018 - Sports Arrow</p>
	</div>
    
</body>

</html>