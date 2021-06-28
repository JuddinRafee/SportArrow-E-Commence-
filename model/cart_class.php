<?php
require_once('database_connection.php');
require_once('datalib.php');
 
class Cart
{
	public function __Construct()
	{}
	
	public function saveCart($productBrand,$productName,$productPrice,$productSize,$productQuan,$code,$userId,$status)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "INSERT INTO checkout_cart(checkoutCode, prodBrand, prodName, prodPrice, prodSize, prodQuan, userId, status)
				VALUES('".$code."','".$productBrand."','".$productName."','".$productPrice."','".$productSize."','".$productQuan."','".$userId."','".$status."')";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ("QUERY FAILED");
		return $result;
		mysqli_close($Con);
	}
	
	public function deleteProd($code, $userId)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "DELETE FROM checkout_cart 
				WHERE checkoutCode = '".$code."' 
				AND userId = '".$userId."'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ("QUERY FAILED");
		return $result;
		mysqli_close($Con);
	}
	
	public function getProductList($userId)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "SELECT *
				FROM checkout_cart
				WHERE userId  = '$userId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function confirmOrder($code,$qty)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "UPDATE checkout_cart SET prodQuan = '$qty' WHERE checkoutCode = '$code'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ("QUERY FAILED");
		return $result;
		mysqli_close($Con);
	}
	
	public function saveBillInfo($adr,$city,$state,$zip,$cnum,$userId)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "UPDATE user 
				SET userAdd='$adr', userCity='$city', userState='$state', userZip = '$zip', userNoAcc = '$cnum' 
				WHERE userId = '$userId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ("QUERY FAILED");
		return $result;
		mysqli_close($Con);
	}
	
	public function updateStatus($userId,$status)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "UPDATE checkout_cart 
				SET status = '$status' 
				WHERE userId = '$userId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ("QUERY FAILED");
		return $result;
		mysqli_close($Con);
	}
	
}
