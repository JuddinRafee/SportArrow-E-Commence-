<html>
	<head><title>Search Shoes</title></head>
	<link rel="shortcut icon" href="images/sportsarrow.ico" >
    
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<style>
	a[class=new]{
		width:100%;
		background-color:#123;
		color:#fff;
		border:2px solid#06F;
		padding:5px;
		font-size:18px;
		cursor:pointer;
		border-radius:5px;
		margin-bottom:15px;
	
	}	
	
	
	button[type=submit]{
		width:70px;
		height:40px;
		background-color:#123;
		color:#fff; 
	
	}
	
	input[type=text]{
		width:55%;
		height:40px;
	}
	
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
	
	table {
    	font-family: arial, sans-serif;
    	border-collapse: collapse;
    	width: 95%;

	}
	
	td, th {
    	border: 1px solid #dddddd;
    	text-align: center;
    	padding: 8px;
	}
</style>
<body>
	<?php 
    
    $con = mysqli_connect("localhost","root","");
    
    if (!$con)
    
      {
    
      die('Could not connect: ' . mysqli_error());
    
      }
    
    mysqli_select_db($con, "sportsarrow");
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
    <div class="sidenav">
    	<a href="displayAdmin.php"><img src="images/arrowT (2).png" style="width:150px;height:110px"></a>
       	<p>Hello, Admin <?php echo $_SESSION['userFullName'];?></p><br><br>
        <a href="../view/searchAtt.php">Search Attire</a>
		<a href="../view/searchShoes.php">Search Shoes</a>
		<a href="../view/searchAcc.php">Search Accessories</a><br><br>
		<a href="../logout.php">Logout</a>
    </div>
    
     <div class="main">
    <center><br></br><form action="../view/searchShoes.php" method="POST">
        <input type="text" name="search" placeholder="SEARCH FOR NAME, BRAND, GENDER, PRICE ">
        <button	 class="new" type="submit" name="search_submit">Search</button>
    </form>
    
    
    
    
    <div class="search_cust">
    <?php
        if(isset($_POST['search_submit'])) 
        {
            $search = mysqli_real_escape_string($con,$_POST['search']);
            $sql = "SELECT * FROM shoes_product WHERE shoesName LIKE'%$search%' OR shoesBrand LIKE'%$search%' OR shoesGender LIKE'%$search%' OR shoesPrice LIKE'%$search%'";
            $result = mysqli_query($con,$sql);
            $queryresult = mysqli_num_rows($result);
    
            
            if($queryresult >0) 
            {
    
                ?>
                <center><table>
                <tr>
                    <th>Product</th>
                    <th>Brand</th>
                    <th>Gender</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>&nbsp </th>
                </tr>
                <?php
                $i=1;
                while($row = mysqli_fetch_assoc($result)) 
                {
                    ?>
                    <div class='cust_box'>
                    <tr>	
                        <td><?php displayB($row['shoesId']) ?></td>
                        <td><?php echo $row['shoesBrand'] ?></td>
                        <td><?php echo $row['shoesGender'] ?></td>
                        <td><?php echo $row['shoesName'] ?></td>
                        <td><?php echo $row['shoesPrice'] ?></td>
                        <td><?php echo $row['shoesSize'] ?></td>
                        <td><?php echo $row['shoesQty'] ?></td>
    
                        <td>
                            <a style="align:center"href="../view/editAttAdmin.php?id=<?php echo $row['shoesId']; ?>"><img src="images/edit.png"  style="width:35px;height:35px"></a>
                            <a style="align:center"href="../view/deleteAtt.php?id=<?php echo $row['shoesId']; ?>"><img src="images/delete.png"  style="width:30px;height:30px"></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                    </div>		
            <?php	
            }
        }
        else 
        {
            echo "" ;
        }
    ?>
    
    </table>
    <a href="../view/displayAdmin.php"  class="submitbtn" ><img src="images/button_back.png"></a>
    <button type="reset" class="resetbtn"><img src="images/button_reset.png"></button>
    </div>
    </div>
   

</body>
</html>