<?php
require_once('database_connection.php');
require_once('crypto_class.php');
require_once('datalib.php');

$Data = new Datalib();
$Crypto=new Crypto();

class Authorization
{
	public function __Construct()
	{		}
	
	public function AuthenticateLogin($loginName,$loginPass)
	{
		$Con = mysqli_connect("localhost", "root", "", "sportsarrow");
		$Data = new Datalib();
		$Crypto = new Crypto();

		$checkAccUser=$this->checkExistAccount_user($loginName);//Check acc user
		$checkAccAdmin=$this->checkExistAccount_admin($loginName);//Check acc admin
		$loginName=mysqli_real_escape_string($Con, $loginName);
		$loginPass=mysqli_real_escape_string($Con, $loginPass);
		
		if(($checkAccUser==false) && ($checkAccAdmin==false))
		{
			echo "<script language='JavaScript'>alert('You are not yet our member. Lets sign up first!!');window.location.href='../signup.php?val=true';</script>";
		}
			
		if($checkAccUser)
		{
			$encryptPass=$Crypto->combination_encrypt($loginPass);
			$sql = "SELECT * FROM user WHERE username='$loginName' AND userPass='$encryptPass'";
			$result=mysqli_query($Con, $sql) or die ('Query Failed' . mysqli_error($Con));
			$row=mysqli_fetch_array($result, MYSQLI_BOTH);
				
			if (mysqli_num_rows($result)==1) 
			{
				session_start();	
				$_SESSION['auth']=true;					
				$_SESSION['userRole']=$row['user_type_id'];
				$_SESSION['userRoleDesc']=$row['user_type_desc'];
				$_SESSION['userId']=$row['userId'];
				$_SESSION['username']=$row['username'];
				$_SESSION['userFullName']=$row['userFullname'];
				$_SESSION['userEmail']=$row['userEmail'];	
				$_SESSION['userGender']=$row['userGender'];		
					
				echo "<script language='JavaScript'>alert('Login SUCCESS.');window.location.href='../home.php?val=true';</script>";		
			}
			else 
			{	
				echo "<script language='JavaScript'>alert('Login FAILED.');window.location.href='../login.php?val=true';</script>";	
			}
		}
		
		if($checkAccAdmin)
		{
			$encryptPass=$Crypto->combination_encrypt($loginPass);
			$sql = "SELECT * 
					FROM admin
					WHERE adUsername='$loginName' 
					AND adPass='$encryptPass'";
					
			$result=mysqli_query($Con, $sql) or die ('Query Failed' . mysqli_error($Con));
			$row=mysqli_fetch_array($result, MYSQLI_BOTH);
				
			if (mysqli_num_rows($result)==1) 
			{
				session_start();	
				$_SESSION['auth']=true;					
				$_SESSION['userRole']=$row['user_type_id'];
				$_SESSION['userRoleDesc']=$row['user_type_desc'];
				$_SESSION['userId']=$row['adId'];
				$_SESSION['username']=$row['adUsername'];
				$_SESSION['userFullName']=$row['adFullname'];
				$_SESSION['userEmail']=$row['adEmail'];	
				$_SESSION['userGender']=$row['adGender'];		
					
				echo "<script language='JavaScript'>alert('Login SUCCESS.');window.location.href='../view/displayAdmin.php?val=true';</script>";		
			}		
			else 
			{	
				echo "<script language='JavaScript'>alert('Login FAILED.');window.location.href='../login.php?val=true';</script>";	
			}
		}
	}
	
	public function AuthenticateSignup($loginName,$loginPass, $fullName, $email, $gender)
	{
		$Con = mysqli_connect("localhost", "root", "", "sportsarrow");
		$Data = new Datalib();
		$Crypto=new Crypto();

		$checkAcc=$this->checkExistAccount_user($loginName);	
		$loginName=mysqli_real_escape_string($Con, $loginName);
		$loginPass=mysqli_real_escape_string($Con, $loginPass);
			
		if ($checkAcc==true)//Acc already exist
		{	
			echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('You already a member!!');
		window.location.href='../index.php';</script>"; 
		}
		else if ($checkAcc==false)//Acc not exist yet
		{
			$encryptPass=$Crypto->combination_encrypt($loginPass);
			$sql = "INSERT INTO user(username, userPass, userFullname, userEmail, userGender, user_type_id, user_type_desc) 
					VALUES('".$loginName."','".$encryptPass."', '".$fullName."', '".$email."', '".$gender."', '2', 'CUSTOMER')";
			$result_insert=$Data->int_db_insertion($sql);
			return $result_insert;
		}
		
	}
	
	private function checkExistAccount_user($loginName)
	{	
		$Con = mysqli_connect("localhost", "root", "", "sportsarrow");
		
		$sql="SELECT userId FROM user WHERE username='$loginName' ";		
		$result=mysqli_query($Con, $sql) or die ('Query Failed checkExistAccount_user' . mysqli_error($Con));
		$row=mysqli_fetch_array($result, MYSQLI_BOTH);
		if (mysqli_num_rows($result)==1) 
		{
			return true;
		}
 
 		else 
		{
			return false;
		}
	}	
	
	private function checkExistAccount_admin($loginName)
	{	
		$Con = mysqli_connect("localhost", "root", "", "sportsarrow");
		
		$sql="SELECT adId FROM admin WHERE adUsername='$loginName' ";		
		$result=mysqli_query($Con, $sql) or die ('Query Failed checkExistAccount_admin' . mysqli_error($Con));
		$row=mysqli_fetch_array($result, MYSQLI_BOTH);
		if (mysqli_num_rows($result)==1) 
		{
			return true;
		}
 
 		else 
		{
			return false;
		}
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
