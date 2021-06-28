<?php
require_once("../model/authorization_class.php");

$Authorization = new Authorization();

$activity = $_GET['activity'];

if($activity=="login")
{
	$loginName=$_POST['userName'];
	$loginPass=$_POST['userPass'];
	
	$Access=$Authorization->AuthenticateLogin($loginName,$loginPass);	
	
	/*if($Access==false)
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('You are not a member yet. Go sign up!');
		window.location.href='../signup.php';</script>"; 
	}
	else if($Access==1)
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Login SUCCESS!!');
		window.location.href='../home.php';</script>"; 	
	}
	else
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Sign up FAILEDD!!');
		window.location.href='../index.php';</script>"; 	
	}*/
}

if($activity=="signUp")
{
	$loginName=$_POST['username'];
	$loginPass=$_POST['password'];
	$userType=$_POST["usertype"];
	$email=$_POST["email"];	
	$fullName=$_POST["fullname"];	
	$gender=$_POST["gender"];		
	
	if ($gender=="")
	{	echo "<script language='JavaScript'>alert('Please choose from the radio button. Thank You.');window.location='../index.php?val=noradio';</script>";	
	}
	
	$Access=$Authorization->AuthenticateSignup($loginName,$loginPass, $fullName, $email, $gender);
	
	if($Access==true)
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Sign up SUCCESS!!');
		window.location.href='../index.php';</script>";  
	}
	else
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Sign up FAILEDD!!');
		window.location.href='../index.php';</script>"; 	
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
