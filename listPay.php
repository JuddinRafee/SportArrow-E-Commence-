
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require_once('model/cart_class.php');

if ($_SESSION['userId']=="" || $_SESSION['username']=="" || $_SESSION['userFullName']=="")
{	
	session_destroy();
	echo "<script language='JavaScript'>alert('You have to login to access this page.');parent.location.href='login.php';</script>";
}

$Cart = new Cart();
?>
<html>
<head>
	<title>Cart</title>
    <link rel="shortcut icon" href="view/images/sportsarrow.ico" >

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
	
	.background{
		
	 	background: url("view/images/white2.png") no-repeat center center fixed; 
	  	-webkit-background-size: cover;
	  	-moz-background-size: cover;
	  	-o-background-size: cover;
	 	 background-size: cover;
	}
	.container {
	  background-color: #f2f2f2;
	  padding: 5px 20px 15px 20px;
	  border: 1px solid lightgrey;
	  border-radius: 3px;
	  background-color:rgba(0,0,0,0.6);
	  

	}
	
	#customers {
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 80%;
		height:100%;
	}
	
	#customers td, #customers th {
		border: 1px solid black;
		padding: 8px;
	}
	
	
	#customers th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: beige;
		color: black;
		text-align:center;
	}
	
	td {
		color: black;
		background-color:white
	}
	
	.btn {
	  background-color: green;
	  color: white;
	  padding: 12px;
	  margin: 10px 0;
	  border: none;
	  width: 10%;
	  border-radius: 3px;
	  cursor: pointer;
	  font-size: 15px;
	}
	
	.btn:hover {
	  background-color: #45a049;
	}
	
	p {
		font-family:Adobe Fan Heiti Std;
		font-size:14px;
	}
	
	
	h1{
		font-family:Adobe Fan Heiti Std;
		font-size:39px;
		text-align:center;
		color : gray;
		text-decoration:underline;
	}
	
	.hr {
		width: 80%;
		height: 1px;
		margin-left: auto;
		margin-right: auto;
		background-color:gray;
		border: 0 none;

	}
	

</style>
<body>
	<script language="JavaScript" type="text/javascript" src="view/js/cart.js"></script>
    <body>
    <div class="top_nav_left" style="color:white;font-family:arial;padding-left:3.0em;padding-top:0.8em">COUNTRY:MALAYSIA/SINGAPORE/BRUNEI/INDONESIA</div>
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
            <br>
            
        <div class="hr"></div>
    	<center><h1>RECEIPT</h1>
    	<center><p>What you want, you will get. Delivery process take at most 1 week. For delivery, we charged RM10 per order.</p></center> 
    
    		<form name="listProd" method="post">
    		<center><table id="customers">
        		<tr>
            		<th>NO</th>
            		<th>PRODUCT</th>
                    <th>STATUS</th>
                    <th>QUANTITY</th>
                    <th>PRICE (unit)</th>
                    <th>ACTION</th>
                </tr>
				<?php
                    $userId=$_SESSION['userId'];
                    $data=$Cart->getProductList($userId);
                    $i=1;
                    $totPrice=10.0;
                    $price=0.0;
                    if($data)
                    {	
                        foreach($data as $row)
                        {	
                            $code = $row ['checkoutCode'];
                            $prodName = $row ['prodName'];
                            $prodQty = $row ['prodQuan'];
                            $prodPrice = $row ['prodPrice']; 
                            $status= $row ['status']; 
                        ?>
                        <tr>
                            <td align="center"><?php echo $i; ?></td>
                            <td align="center"><?php echo $prodName; ?></td>
                            <input type="hidden" id="code" name="code" value="<?php echo $code?>"/>
                            <td align="center"><?php echo $status; ?></td>
                            <?php if($status=='IN CART')
                            {?>
                                <td align="center"><input type="number" name="quantity" value="<?php echo $prodQty;?>"/></td>
                                <td align="center"><?php echo $prodPrice; ?></td>
                                <center><td style="background-color:wite"><button type="button" name="Delete" onClick="location.href='../SportsArrow/controller/cart_control.php?activity=deleteProd&code=<?php echo $code; ?>'">REMOVE</button></td></center>
                                </tr>
                             <?php 
                                $price = $prodPrice * $prodQty;
                                $totPrice += $price;
                                $i++;
                            }
                            else
                            {?>
                                <td align="center"><?php echo $prodQty;?></td>
                                <td align="center"><?php echo $prodPrice; ?></td>
                                <td>&nbsp </td> 
                            </tr>
                            <?php 
                            }?>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th><center>TOTAL PRICE  : RM<?php echo $totPrice; ?></center></th>
                        <td>&nbsp;</td>
                    </tr>
                </table> 
				<?php 
                if($status=='IN CART')
                {?>
                    <br><br><input type="button" name="confirmCart" id="confirmCart" value="Confirm Order" onClick="product('confirmCart');" class="btn">
                <?php 
                }?>
        </form>
      </div>
 
</body>
</html>