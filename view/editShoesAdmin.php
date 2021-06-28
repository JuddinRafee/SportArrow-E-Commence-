<html>
<head>
	<title>Admin's</title>
    <link rel="shortcut icon" href="images/sportsarrow.ico" >
</head>
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
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
	
	* {
    	box-sizing: border-box;
	}

	.container {
		padding : 10px;
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

	.updatebtn {
		background-color: transparent;
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
	
	
	
	.resetbtn {
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
    	<a href="displayAdmin.php"><img src="images/arrowT (2).png" style="width:150px;height:110px"></a>
        <p>Hello, Admin <?php echo $_SESSION['userFullName'];?></p><br><br>
        <a href="../view/searchAtt.php">Search Attire</a>
        <a href="../view/searchShoes.php">Search Shoes</a>
        <a href="../view/searchAcc.php">Search Accessories</a><br><br>
        <a href="../logout.php">Logout</a>
 	</div>

	<?php
     $id = $_GET['id'];
    $con = mysqli_connect("localhost","root","");
    
    if (!$con)
    
      {
    
      die('Could not connect: ' . mysql_error());
    
      }
    
    mysqli_select_db($con, "sportsarrow");
    ?>
    
    <?php 
    
        if(isset($_POST['update']))
    {    
            
        $brand=$_POST['brand'];
        $name=$_POST['name'];
        $size=$_POST['size'];  
        $price=$_POST['price'];
        $gender=$_POST['gender'];
        $image=$_POST['image'];  
        $quantity=$_POST['quantity'];    	
        
           
            
            $result = mysqli_query($con, "UPDATE shoes_product SET shoesBrand='$brand',shoesName='$name',shoesSize='$size', shoesPrice='$price', shoesGender='$gender', shoesQty='$quantity' WHERE shoesId='$id'");
            
            header("Location: ../view/displayAdmin.php");
    }
    ?>
    <?php
    //getting id from url
    $id = $_GET['id'];
     
    //selecting data associated with this particular id
    $result = mysqli_query($con, "SELECT * FROM shoes_product WHERE shoesId=$id");
     
    while($res = mysqli_fetch_array($result))
    {
        
        $id = $res['shoesId'];    
        $brand=$res['shoesBrand'];
        $name=$res['shoesName'];
        $size=$res['shoesSize'];  
        $price=$res['shoesPrice'];
        $gender=$res['shoesGender'];
        $image=$res['image'];  
        $quantity=$res['shoesQty'];
    }
    ?>
     <div class="main">
    <h2>Edit product</h2>
    <form action="" method="post">
      <div class="container">
      
       
        <label for="brand"><b>Brand</b></label>
        <input type="text" placeholder="Brand" name="brand" value="<?php echo $brand; ?>">
        
        <label for="gender" value="<?php echo $gender; ?>"><b>Gender</b></label><br>
      	<?php
        if($gender=='M')
		{?>
        	<input type="radio" name="gender" value="M" checked="checked">Male<br>
			<input type="radio" name="gender" value="F">Female<br>
		<?php
        }
		else
		{?>
			<input type="radio" name="gender" value="M" >Male<br>
			<input type="radio" name="gender" value="F" checked="checked">Female<br>
		
        <?php
        }
		?>
        <br>
    
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Name" name="name" value="<?php echo $name; ?>">
    
        
        <label for="size" value="<?php echo $size;  ?>"><b>Size</b></label><br>
        <?php
        if($size=='37')
		{?>
        	<input type="radio" name="size" value="37" checked="checked">37<span>
        	<input type="radio" name="size" value="38">38<span>
        	<input type="radio" name="size" value="39">39<span>
        	<input type="radio" name="size" value="40">40<span>
       		<input type="radio" name="size" value="41">41<span>
       		<input type="radio" name="size" value="42">42<br><br>
		<?php
        }
		else if($size=='38')
		{?>
			<input type="radio" name="size" value="37">37<span>
       	 	<input type="radio" name="size" value="38" checked="checked">38<span>
        	<input type="radio" name="size" value="39">39<span>
        	<input type="radio" name="size" value="40">40<span>
        	<input type="radio" name="size" value="41">41<span>
        	<input type="radio" name="size" value="42">42<br><br>
       	<?php
        }
		else if($size=='39')
		{?>
        	<input type="radio" name="size" value="37">37<span>
       		<input type="radio" name="size" value="38">38<span>
        	<input type="radio" name="size" value="39" checked="checked">39<span>
       	 	<input type="radio" name="size" value="40">40<span>
       		<input type="radio" name="size" value="41">41<span>
        	<input type="radio" name="size" value="42">42<br><br>
        <?php
        }
        else if($size=='40')
		{?>
			<input type="radio" name="size" value="37">37<span>
        	<input type="radio" name="size" value="38">38<span>
        	<input type="radio" name="size" value="39">39<span>
       		<input type="radio" name="size" value="40" checked="checked">40<span>
        	<input type="radio" name="size" value="41">41<span>
        	<input type="radio" name="size" value="42">42<br><br>
		<?php
        }
		else if($size=='41')
		{?>
			<input type="radio" name="size" value="37">37<span>
        	<input type="radio" name="size" value="38">38<span>
        	<input type="radio" name="size" value="39">39<span>
        	<input type="radio" name="size" value="40">40<span>
        	<input type="radio" name="size" value="41" checked="checked">41<span>
        	<input type="radio" name="size" value="42">42<br><br>
       	<?php
        }
		else 
		{?>
			<input type="radio" name="size" value="37">37<span>
       	 	<input type="radio" name="size" value="38">38<span>
       	 	<input type="radio" name="size" value="39">39<span>
        	<input type="radio" name="size" value="40">40<span>
        	<input type="radio" name="size" value="41">41<span>
       	 	<input type="radio" name="size" value="42" checked="checked">42<br><br>
       	<?php
        }?>
        
        <label for="price"><b>Price</b></label>
        <input type="text" placeholder="Price" name="price" value="<?php echo $price; ?>">
        
        <label for="quant"><b>Quantity</b></label>
        <input type="text" placeholder="Quantity" name="quantity" value="<?php echo $quantity; ?>">
        
    
       <div class="button">
            <button   type="submit" name="update" class="updatebtn" value="Update"><img src="images/button_update.png"></button>
            <button type="reset" class="resetbtn"><img src="images/button_reset.png"></button>
            <div class="right">
             <a href="../view/displayAdmin.php"  class="submitbtn" ><img src="images/button_back.png"></a>
            </div>
        </div>
      </div>
    </form>

</body>
</html>
