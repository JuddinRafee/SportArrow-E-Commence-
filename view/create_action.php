<html>
<head>
<style>
	.submitbtn {
			background-color: #4CAF50;
			color: white;
			padding: 16px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
			opacity: 0.9;
		}
</style>
</head>
<body>
<?php

$con = mysqli_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysqli_select_db($con, "sportsarrow");




 $category= $_POST['category'];
	
if( $category == "A1")
{
	$name=addslashes($_FILES['image']['name']);
	$image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
		
   $sql="INSERT into attire_product(attBrands, attName, attSize, attprice, attGender,attQty,category_product, name, image) VALUES
             ('$_POST[brand]','$_POST[name]', '$_POST[size]' , '$_POST[price]', '$_POST[gender]','$_POST[quantity]','$_POST[category]','$name' , '$image')";
}

else if( $category =="B1")
{
	$name=addslashes($_FILES['image']['name']);
	$image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
		
	$sql="INSERT into shoes_product(shoesBrand, shoesName, shoesSize, shoesPrice, shoesGender,shoesQty,category_product, name, image) VALUES
   ('$_POST[brand]','$_POST[name]', '$_POST[size]' , '$_POST[price]', '$_POST[gender]','$_POST[quantity]','$_POST[category]', '$name', '$image')";
}

else
{
	$name=addslashes($_FILES['image']['name']);
		$image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
		
	$sql="INSERT into acc_product(accBrands, accName, accSize, accPrice, accGender, accQty,category_product,name, image) VALUES
             ('$_POST[brand]','$_POST[name]', '$_POST[size]' , '$_POST[price]', '$_POST[gender]','$_POST[quantity]','$_POST[category]', '$name' , '$image')";
}
if (!mysqli_query($con,$sql))

  {

  die('Error: ' . mysqli_error($con));

  }

echo "ADDED!";

 

mysqli_close($con)

?>

<br>
<br>
<span><a href="../view/displayAdmin.php"  class="submitbtn" ><img src="images/button_back.png"</a></span>
</body>
</html>