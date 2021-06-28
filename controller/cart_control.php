<?php
session_start();
require_once("../model/authorization_class.php");
require_once("../model/crypto_class.php");
require_once("../model/cart_class.php");
require_once("../model/database_connection.php");
require_once("../model/product_class.php");

$Authorization = new Authorization();
$Crypto=new Crypto();
$Cart=new Cart();
$Product=new Product();

$activity = $_GET['activity'];

if($activity=="addToCart")
{
	$productId=$_POST['prodId'];
	$productCat=$_POST['prodCat'];
	$productBrand=$_POST['prodBrand'];
	$productName=$_POST['prodName'];
	$productPrice=$_POST['prodPrice'];
	$productQuan=$_POST['quantity'];
	$productSize=$_POST['size'];
	$userId = $_SESSION['userId'];
	
	if($productCat=="A1")
	{
		$code = 'SAA' . $productId;
	}
	else if($productCat=="B1")
	{
		$code = 'SAB' . $productId;
	}
	else
	{
		$code = 'SAC' . $productId;
	}
	
	$status = 'IN CART';
	
	$saveCart=$Cart->saveCart($productBrand,$productName,$productPrice,$productSize,$productQuan,$code,$userId,$status);	
	
	if($saveCart)
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('This product successfully keep in your cart.');window.history.back();</script>";
	}
	else
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert(This product failed to keep in your cart.');window.history.back();</script>";
	}
}

if($activity=="deleteProd")
{
	$code=$_GET["code"];
	$userId=$_SESSION["userId"];
	$delete=$Cart->deleteProd($code, $userId);
	
	if ($delete==1)
		{	echo "<script language='JavaScript'>alert('Product successfully REMOVED.');
		window.location='../listPay.php';</script>";
	 	}	
	else
		{	echo "<script language='JavaScript'>alert('Action FAILED. Please try again.');
		window.location='../listPay.php';</script>";	
		} 
	
}

if($activity=="confirmCart")
{
	$code=$_POST["code"];
	$qty=$_POST["quantity"];
	
	$cat=substr($code, 2, 1); 
	$id=substr($code, 3, 1);
	
	$confirmOrder=$Cart->confirmOrder($code,$qty);
	
	if ($confirmOrder)
	{	
		if($cat=='A')
		{
			$updateQty=$Product->updateQtyA($id,$qty);
			if($updateQty)
			{
				echo "<script language='JavaScript'>alert('Please enter the shipping address and payment.');
		window.location='../payment.php';</script>";
			}
		}
		else if($cat=='B')	
		{
			$updateQty=$Product->updateQtyB($id, $qty);
			if($updateQty)
			{
				echo "<script language='JavaScript'>alert('Please enter the shipping address and payment.');
		window.location='../payment.php';</script>";
			}
		}
		else
		{
			$updateQty=$Product->updateQtyC($id, $qty);
			if($updateQty)
			{
				echo "<script language='JavaScript'>alert('Please enter the shipping address and payment.');
		window.location='../payment.php';</script>";
			}
		}
	}	
	else
	{	
		echo "<script language='JavaScript'>alert('Action FAILED. Please try again.');
		window.location='../listPay.php';</script>";	
	} 
	
}

if($activity=="checkout")
{
	$userFullName = $_SESSION['userFullName'];
	$userId = $_SESSION['userId'];
	$adr=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
	//$card=$_POST['card'];
	$cname =$_POST['cardname'];
	$cnum=$_POST['cardnumber'];
	$expmonth = $_POST['expmonth'];
	$expyear =$_POST['expyear'];
	$cvv = $_POST['cvv'];

	$saveBillInfo=$Cart->saveBillInfo($adr,$city,$state,$zip,$cnum,$userId);
	
	if($saveBillInfo)
	{
		$status = 'SHIPPING';
		$updateStatus=$Cart->updateStatus($userId,$status);
		if($updateStatus)
		{
			echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Your product will be shipped by tomorrow.');window.location.href='../listPay.php';</script>";
		}
		else
		{
			echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Shipping failed.');window.location.href='../listPay.php';</script>";
		}
	}
	else
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Transaction failed.');window.location.href='../index.php';</script>";
	}
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
