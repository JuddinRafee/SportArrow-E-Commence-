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
		margin-left: 160px; 

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
	
	table {
    	font-family: arial, sans-serif;
    	border-collapse: collapse;
    	width: 85%;

	}

	td, th {
    	border: 1px solid #dddddd;
    	text-align: center;
    	padding: 8px;
	}

	tr:nth-child(even) {
    	background-color: #dddddd;
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
	
	p,a{
		font-family:arial;
		text-align:center;
	}
	
	p{
		font-weight:bold;
	}
	
	.nav{
		border-width:1px 0;
		list-style:none;
		margin:0;
		padding:0;
		text-align:center;
		background-color:black ;
	}
	
	
	.top_nav_leftt {
		float: left;
		padding-left:15em;
	}

</style>
<body>
<body>
<?php

$con = mysqli_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

mysqli_select_db($con, "sportsarrow");
?>
<?php
function displayA($attId)
{
	$con=mysqli_connect("localhost", "root", "", "sportsarrow");
	$sql = "select * from attire_product WHERE attId = '$attId'";
	$query = mysqli_query($con, $sql);
	$num = mysqli_num_rows($query);
	{
		$result = mysqli_fetch_array($query);
		$img = $result['image'];
		echo '<img src="data: image;base64,'.$img.'">';
	}
}
?>
<?php
function displayB($shoesId)
{
	$con=mysqli_connect("localhost", "root", "", "sportsarrow");
	$sql = "select * from shoes_product WHERE shoesId = '$shoesId'";
	$query = mysqli_query($con, $sql);
	$num = mysqli_num_rows($query);
	{
		$result = mysqli_fetch_array($query);
		$img = $result['image'];
		echo '<img src="data: image;base64,'.$img.'">';
	}
}
?>
<?php
function displayC($accId)
{
	$con=mysqli_connect("localhost", "root", "", "sportsarrow");
	$sql = "select * from acc_product WHERE accId = '$accId'";
	$query = mysqli_query($con, $sql);
	$num = mysqli_num_rows($query);
	{
		$result = mysqli_fetch_array($query);
		$img = $result['image'];
		echo '<img src="data: image;base64,'.$img.'">';
	}
}
?>

<?php 
    $query = "SELECT * FROM attire_product";
	$query1 = "SELECT * FROM shoes_product";
	$query2 = "SELECT * FROM acc_product";
	$read = mysqli_query($con, $query);
    $read1 =mysqli_query($con, $query1);
	$read2 =mysqli_query($con,$query2);
?>


    <div class="sidenav">
    	<a href="displayAdmin.php"><img src="images/arrowT (2).png" style="width:150px;height:110px"></a>
        <p>Hello, Admin <?php echo $_SESSION['userFullName'];?></p><br><br>
		<a href="../view/searchAtt.php">Search Attire</a>
		<a href="../view/searchShoes.php">Search Shoes</a>
		<a href="../view/searchAcc.php">Search Accessories</a><br><br>
		<a href="../logout.php">Logout</a>
		
    </div>
    
   <br><br><br>
   <ul class="nav">
		<div class="top_nav_leftt">
			<a href="../view/createAdmin.php"><img src="../view/images/createProduct.png"></a>
		</div>
	</ul>
    
	<div class="main">
    	<span>
		
	<br><br>
    <p>ATTIRES</p>
    <br><center>
    <table>
             <tr>
                <th>Product</th>
                <th>Brand</th>
                <th>Gender</th>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>&nbsp;</th>
            </tr>
            
            <?php if($read) { ?>
                <?php while($row = $read->fetch_assoc()) { ?>
            
            <tr>           
                <td><?php displayA($row ['attId']); ?> </td>
                <td><?php echo $row['attBrands'];?></td>
                <td><?php echo $row['attGender']; ?></td>
                <td><?php echo $row['attName']; ?></td>
                <td>RM<?php echo $row['attPrice']; ?></td>
                <td><?php echo $row['attSize']; ?></td>
                <td><?php echo $row['attQty']; ?></td>
                <td>
                    <a style="align:center"href="../view/editAttAdmin.php?id=<?php echo $row['attId']; ?>"><img src="images/edit.png"  style="width:35px;height:35px"></a>
                    <a style="align:center"href="../view/deleteAtt.php?id=<?php echo $row['attId']; ?>"><img src="images/delete.png"  style="width:30px;height:30px"></a>
                </td>
                
        </tr>   
        
                <?php } ?>
                <?php }else{ echo "DATA NOT FOUND"; } ?>
        
            
    </table>
    </center>
    <br><br>
    <p>SHOES</p>
    <br><center>
    <table>
             <tr>
                <th>Product</th>
                <th>Brand</th>
                <th>Gender</th>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>&nbsp;</th>
            </tr>
            
            <?php if($read1) { ?>
                <?php while($row = $read1->fetch_assoc()) { ?>
            
            <tr>           
                <td><?php displayB($row ['shoesId']);  ?> </td>
                <td><?php echo $row['shoesBrand'];?></td>
                <td><?php echo $row['shoesGender'];?></td>
                <td><?php echo $row['shoesName']; ?></td>
                <td>RM<?php echo $row['shoesPrice']; ?></td>
                <td><?php echo $row['shoesSize']; ?></td>
                <td><?php echo $row['shoesQty']; ?></td>
                <td>
                    <a style="align:center"href="../view/editShoesAdmin.php?id=<?php echo $row['shoesId']; ?>"><img src="images/edit.png"  style="width:35px;height:35px"></a>
                    <a style="align:center"href="../view/deleteShoes.php?id=<?php echo $row['shoesId']; ?>"><img src="images/delete.png"  style="width:30px;height:30px"></a>
                </td>
                
        </tr>   
        
                <?php } ?>
                <?php }else{ echo "DATA NOT FOUND"; } ?>
        
            
    </table>
    </center>
    <br><br>
    <p>ACCESORIES</p>
    <br><center>
    <table>
             <tr>
                <th>Product</th>
                <th>Brand</th>
                <th>Gender</th>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>&nbsp;</th>
            </tr>
            
            <?php if($read2) { ?>
                <?php while($row = $read2->fetch_assoc()) { ?>
            
            <tr>           
                <td><?php displayC($row ['accId']); ?> </td>
                <td><?php echo $row['accBrands'];?></td>
                <td><?php echo $row['accGender'];?></td>
                <td><?php echo $row['accName']; ?></td>
                <td>RM<?php echo $row['accPrice']; ?></td>
                <td><?php echo $row['accSize']; ?></td>
                <td><?php echo $row['accQty']; ?></td>
                <td>
                    <a style="align:center"href="../view/editAccAdmin.php?id=<?php echo $row['accId']; ?>"><img src="images/edit.png"  style="width:35px;height:35px"></a>
                    <a style="align:center"href="../view/deleteAcc.php?id=<?php echo $row['accId']; ?>"><img src="images/delete.png"  style="width:30px;height:30px"></a>
                </td>
                
        </tr>   
        
                <?php } ?>
                <?php }else{ echo "DATA NOT FOUND"; } ?>
        
            </table>
            </center>
        </div>
</body>
</html>