<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
    <link rel="shortcut icon" href="view/images/sportsarrow.ico" >
<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once('model/product_class.php');

if ($_SESSION['userId']=="" || $_SESSION['username']=="" || $_SESSION['userFullName']=="")
{	
	session_destroy();
	echo "<script language='JavaScript'>alert('You have to login to access this page.');parent.location.href='login.php';</script>";
}
?>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

	* {
	  box-sizing: border-box;
	}
	
	.row {
	  display: -ms-flexbox; /* IE10 */
	  display: flex;
	  -ms-flex-wrap: wrap; /* IE10 */
	  flex-wrap: wrap;
	  margin: 0 -16px;
	}
	
	.col-25 {
	  -ms-flex: 25%; /* IE10 */
	  flex: 25%;
	}
	
	.col-50 {
	  -ms-flex: 50%; /* IE10 */
	  flex: 50%;
	}
	
	.col-75 {
	  -ms-flex: 75%; /* IE10 */
	  flex: 75%;
	}
	
	.col-25,
	.col-50,
	.col-75 {
	  padding: 0 16px;
	}
	
	.container {
  		background-color: #F2F2F2;
  		padding: 5px 20px 30px 20px;
		border: 1px solid lightgray;
		border-radius: 3px;
		margin-left:110px;
		margin-right:110px;
}
	
	input[type=text] {
	  width: 100%;
	  margin-bottom: 20px;
	  padding: 12px;
	  border: 1px solid #ccc;
	  border-radius: 3px;
	}
	
	label {
	  margin-bottom: 10px;
	  display: block;
	}
	
	.icon-container {
	  margin-bottom: 20px;
	  padding: 7px 0;
	  font-size: 24px;
	}
	
	.btn {
	  background-color: green;
	  color: white;
	  padding: 12px;
	  margin: 10px 0;
	  border: none;
	  width: 20%;
	  border-radius: 3px;
	  cursor: pointer;
	  font-size: 17px;
	}
	
	.btn:hover {
	  background-color: #45a049;
	}
	
	a {
	  color: #2196F3;
	}

	
	span.price {
	  float: right;
	  color: grey;
	}

	@media (max-width: 800px) {
	  .row {
		flex-direction: column-reverse;
	  }
	  .col-25 {
		margin-bottom: 20px;
	  }
	}

	
	h2{
		font-family:Adobe Fan Heiti Std;
		font-size:39px;
		text-align:center;
		color : gray;
	}
	
	p {
		font-family:Adobe Fan Heiti Std;
		font-size:14px;
	}
	
	.hr {
		width: 80%;
		height: 1px;
		margin-left: auto;
		margin-right: auto;
		background-color:gray;
		border: 0 none;
	}
	
	h3 {
		font-family:Adobe Fan Heiti Std;
		font-size:14px;
	}
	
	.bg1 {
		bakcground-color:white;
	}
	
	.resetbtn {
		background-color:transparent;
		padding: 20px 30px;
		margin: -2px 0;
		border: none;
		cursor: pointer;
		width: 10%;
		opacity: 0.9;
		float:right;
	}
	
		
	
</style>
<script language="JavaScript" type="text/javascript" src="view/js/cart.js"></script>
</head>
<body>
   <div class="top_nav_left" style="color:white;font-family:arial;padding-left:3.0em;padding-top:0.8em">COUNTRY:MALAYSIA/SINGAPORE/BRUNEI/INDONESIA</div>
        <br><ul class="nav">
            <div class="top_nav_right">
            <a href="home.php">HOME</a>
            <a href="view/women.php">WOMEN</a>
            <a href="view/men.php">MEN</a>
            <a href="view/contact.php">CONTACT</a>
            <img src="view/images/login.png" style="width:23px;height:20px"></a>Hi, <?php echo $_SESSION['userFullName']; ?>
            <a href="listPay.php"><img src="view/images/checkout2.png" style="width:28px;height:25px"></a>
            <a href="logout.php"><img src="view/images/logout2.png" style="width:22px;height:25px"></a>
            </div>
            <div class="top_nav_leftt">
                <img src="view/images/arrowT (2).png" style="width:130px;height:100px">
            </div>
            </ul><br><br><br><br><br><br>
            
     <div class="hr"></div>
    <center><h2>CHECKOUT FORM</h2></center>
    <div class="bg1">
    <div class="row">
      <div class="col-75">
        <div class="container">
          <form name="formBilling" method="post">
            <div class="row">
              <div class="col-50">
                <h3>BILLING ADDRESS</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com">
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="address" name="address" placeholder="542 W. 15th Street">
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York">
    
                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY">
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001">
                  </div>
                </div>
              </div>
    
              <div class="col-50">
                <h3>PAYMENT</h3>
                
                
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <br><br>  
                <select id="card">
                  <option>Visa</option>
                  <option>Master card</option>
                  <option>American Express</option>
                 </select>
                </div>
                
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe(fullname)">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">
                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              </div>
              
            </div>
            <center><input type="button" id="checkout" name="checkout" value="Check Out" onclick="product('checkout');" class="btn">
            <button type="reset" class="resetbtn"><img src="view/images/button_reset.png"></button>
    </div>
          </form>
        </div>
      </div>
      </div>
    </div>
    </div>
</body>
</html>