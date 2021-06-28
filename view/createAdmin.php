<html>
<head>
	<title>Admin's</title>
    <link rel="shortcut icon" href="images/sportsarrow.ico" >
</head>
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once('../model/product_class.php');
require_once('../model/database_connection.php');
require_once('../model/image_class.php');
require_once('../controller/php_image_magician.php');

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

	.main {
		margin-left: 200px; 

	}

	.sidenav {
		height: 100%;
		width: 200px;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #111;
		overflow-x: hidden;
		padding-top: 20px;
	}
	
	.sidenav p {
		color : white;
		font-family:Adobe Fan Heiti Std;
	}
	
	.sidenav a {
		padding: 6px 8px 6px 16px;
		text-decoration: none;
		font-size: 14px;
		color: white;
		display: block;
		font-family:Adobe Fan Heiti Std;
	}
	
	.sidenav a:hover {
		color: #f1f1f1;
	}

	body {
		font-family : Adobe Fan Heiti Std;
		font-size : 14px;
		/*background-color : #111;*/
		padding:50px;
	}
	
	body {
		font-family : Adobe Fan Heiti Std;
		font-size : 14px;
		/*background-color : #111;*/
		padding:50px;
	}
	
	* {
    	box-sizing: border-box;
	}

	.container {
		padding : 5px;
		padding-top:0.5em;
    	background-color: white;
	}
	
	input[type=text], input[type=password] {
    	width: 100%;
    	padding: 15px;
    	margin: 5px 0 22px 0;
   		display: inline-block;
    	border: none;
   		background: #f1f1f1;
	}
	
	input[type=text]:focus, input[type=password]:focus {
		background-color: #ddd;
		outline: none;
	}

	.submitbtn {
		background-color: transparent;
		padding: 16px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 10%;
		opacity: 0.9;
	}
	
	
	.resetbtn {
		background-color:transparent;
		padding: 16px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 10%;
		opacity: 0.9;
	}
	
	.backbtn {
		background-color:transparent;
		padding: 16px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 10%;
		opacity: 0.9;
	}
	
	a {
		color: dodgerblue;
	}
	
	p,a{
		font-family:arial;
		text-align:center;
	}
	
	h2 {
		font-size:23px;
		text-decoration : underline;
	}
	
	.right {
		padding-right : 1em;
		float: right;
	}
	


</style>
<body>

	<div class="sidenav">
    	<a href="view/displayAdmin.html"><img src="images/arrowT (2).png" style="width:150px;height:110px"></a>
        <p>Hello, Admin <?php echo $_SESSION['userFullName'];?></p><br><br>
        <a href="../view/searchAtt.php">Search Attire</a>
		<a href="../view/searchShoes.php">Search Shoes</a>
		<a href="../view/searchAcc.php">Search Accessories</a><br><br>
		<a href="../logout.php">Logout</a>
    </div>
    
	 <div class="main">
        <h2>Insert new product</h2>
		
		<form method="post" action="create_action.php" enctype="multipart/form-data">
		  <div class="container">
		  
		  <label for="category"><b>Category</b></label><br>
			<input type="radio" name="category" value="A1">Attire<br>
			<input type="radio" name="category" value="B1">Shoes<br>
			<input type="radio" name="category" value="C1">Accesories<br><br>
		  
			<input type="file" name="image"><br><br>
            
			<label for="brand"><b>Brand</b></label>
			<input type="text" placeholder="Brand" name="brand" required>
			
			<label for="gender"><b>Gender</b></label><br>
			<input type="radio" name="gender" value="M">Male<br>
			<input type="radio" name="gender" value="F">Female<br>
			<br>
		
			<label for="name"><b>Name</b></label>
			<input type="text" placeholder="Name" name="name" required>
		
			
			<label for="size"><b>Size</b></label><br>
			<input type="radio" name="size" value="S">S<span>
			<input type="radio" name="size" value="M">M<span>
			<input type="radio" name="size" value="L">L<br>
			<input type="radio" name="size" value="37">37<span>
			<input type="radio" name="size" value="38">38<span>
			<input type="radio" name="size" value="39">39<span>
			<input type="radio" name="size" value="40">40<span>
			<input type="radio" name="size" value="41">41<span>
			<input type="radio" name="size" value="42">42<br>
            <input type="radio" name="size" value="freesize">Free Size<br><br>
			
			<label for="price"><b>Price</b></label>
			<input type="text" placeholder="Price" name="price" required>
			
			<label for="quant"><b>Quantity</b></label>
			<input type="text" placeholder="Quantity" name="quantity" required>
			
		
        	<div class="button">
				<button type="submit" class="submitbtn"><img src="images/button_submit.png"></button>
            	<button type="reset" class="resetbtn"><img src="images/button_reset.png"></button>
                <div class="right">
               		<a href="../view/displayAdmin.php"  class="submitbtn" ><img src="images/button_back.png"</a>
                </div>
		  	</div>
		</form>

</body>
</html>
