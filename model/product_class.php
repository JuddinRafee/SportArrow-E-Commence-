<?php
require_once('database_connection.php');
require_once('datalib.php');
 
class Product
{
	public function __Construct()
	{}
	
	public function getAttireList($gender)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "SELECT *
				FROM attire_product
				WHERE attGender = '$gender'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function getShoesList($gender)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "SELECT *
				FROM shoes_product
				WHERE shoesGender = '$gender'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function getAcceList($gender)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "SELECT *
				FROM acc_product
				WHERE accGender = '$gender'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function getProductA($productId)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "SELECT *
				FROM attire_product
				WHERE attId = '$productId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function getProductB($productId)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "SELECT *
				FROM shoes_product
				WHERE shoesId = '$productId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function getProductC($productId)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "SELECT *
				FROM acc_product
				WHERE accId = '$productId'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function saveProduct($prodBrand,$prodName,$prodCat,$prodSize,$prodPrice,$prodQty,$prodGender)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		if($prodCat=='A1')
		{
			$sql = "INSERT INTO attire_product(attBrands, attName, attSize, attPrice, attGender, attQty, category_product)
					VALUES ('$prodBrand','$prodName','$prodSize','$prodPrice','$prodGender','$prodQty','$prodCat')";
			//echo $sql; exit();
		}
		else if($prodCat=='B1')
		{
			$sql = "INSERT INTO shoes_product(shoesBrand, shoesName, shoesSize, shoesPrice, shoesGender, shoesQty, category_product)
					VALUES ('$prodBrand','$prodName','$prodSize','$prodPrice','$prodGender','$prodQty','$prodCat')";
			//echo $sql; exit();
		}
		else
		{
			$sql = "INSERT INTO acce_product(accBrands, accName, accSize, accPrice, accGender, accQty, category_product)
					VALUES ('$prodBrand','$prodName','$prodSize','$prodPrice','$prodGender','$prodQty','$prodCat')";
			//echo $sql; exit();
		}
		
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function savePhoto($uploadedFile,$prodId,$prodCat)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		if($prodCat=='A1')
		{
			$sql = "UPDATE attire_product 
					SET attPhoto = '$uploadedFile' 
					WHERE attireId = '$prodId'";
			//echo $sql; exit();
		}
		else if($prodCat=='B1')
		{
			$sql = "UPDATE shoes_product 
					SET shoesPhoto = '$uploadedFile' 
					WHERE shoesId = '$prodId'";
			//echo $sql; exit();
		}
		else
		{
			$sql = "UPDATE acc_product 
					SET accPhoto = '$uploadedFile' 
					WHERE accId = '$prodId'";
			//echo $sql; exit();
		}
		
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function getProdId($prodName,$prodCat)
	{	
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		if($prodCat=='A1')
		{
			$sql = "SELECT attId As prodId
					FROM attire_product
					WHERE attName = '$prodName'";
			//echo $sql; exit();
		}
		else if($prodCat=='B1')
		{
			$sql = "SELECT shoesId As prodId
					FROM shoes_product
					WHERE shoesName = '$prodName'";
			//echo $sql; exit();
		}
		else
		{
			$sql = "SELECT accId As prodId
					FROM acce_product
					WHERE accName = '$prodName'";
			//echo $sql; exit();
		}
		$result = mysqli_query($Con,$sql) or die ();
		$row = mysqli_fetch_object($result);
		return $row->prodId;
		mysqli_close($Con);
	}
	
	public function updateQtyA($id,$qty)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "UPDATE attire_product
				SET attQty = attQty - '$qty'
				WHERE attId = '$id'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function updateQtyB($id,$qty)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "UPDATE shoes_product
				SET shoesQty = shoesQty - '$qty'
				WHERE shoesId = '$id'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	public function updateQtyC($id,$qty)
	{
		$Con = mysqli_connect('localhost','root', '', 'sportsarrow');
		$sql = "UPDATE acc_product
				SET accQty = accQty - '$qty'
				WHERE accId = '$id'";
		//echo $sql; exit();
		$result = mysqli_query($Con,$sql) or die ();
		return $result;
		mysqli_close($Con);
	}
	
	function displayA($attId)
	{
		$con=mysqli_connect("localhost", "root", "", "sportsarrow");
		$sql = "select * from attire_product WHERE attId = '$attId'";
		$query = mysqli_query($con, $sql);
		$num = mysqli_num_rows($query);
	
		$result = mysqli_fetch_array($query);
		$img = $result['image'];
		echo '<img src="data: image;base64,'.$img.'">';
	
	}
	
	function displayB($shoesId)
	{
		$con=mysqli_connect("localhost", "root", "", "sportsarrow");
		$sql = "select * from shoes_product WHERE shoesId = '$shoesId'";
		$query = mysqli_query($con, $sql);
		$num = mysqli_num_rows($query);
		
		$result = mysqli_fetch_array($query);
		$img = $result['image'];
		echo '<img src="data: image;base64,'.$img.'">';
	}
	
	function displayC($accId)
	{
		$con=mysqli_connect("localhost", "root", "", "sportsarrow");
		$sql = "select * from acc_product WHERE accId = '$accId'";
		$query = mysqli_query($con, $sql);
		$num = mysqli_num_rows($query);
	
		$result = mysqli_fetch_array($query);
		$img = $result['image'];
		echo '<img src="data: image;base64,'.$img.'">';
	}
}