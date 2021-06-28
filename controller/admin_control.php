<?php
session_start();
require_once("../model/database_connection.php");
require_once("../model/authorization_class.php");
require_once("../model/crypto_class.php");
require_once("../model/cart_class.php");
require_once("../model/product_class.php");
require('../model/image_class.php');
require('../controller/php_image_magician.php');

$Authorization = new Authorization();
$Crypto=new Crypto();
$Cart=new Cart();
$Product=new Product();
$myImageUpload = new maxImageUpload(); 

	$prodBrand=$_POST['brand'];
	$prodName=$_POST['name'];
	$prodCat=$_POST['category'];
	$prodSize=$_POST['size'];
	$prodPrice=$_POST['price'];
	$prodQty=$_POST['quantity'];
	$prodGender=$_POST['gender'];
	
	$saveProd = $Product->saveProduct($prodBrand,$prodName,$prodCat,$prodSize,$prodPrice,$prodQty,$prodGender);
	$prodId = $Product->getProdId($prodName,$prodCat);
	
	if($saveProd)
	{
		/*START UPLOAD*/
		//create n check folder
		$file_mfolder_type = "../pictures/'".$prodId."'";
		$file_path_mfolder_type = str_replace("|","/",$file_mfolder_type);
		if (!file_exists($file_path_mfolder_type))
		{	mkdir("../pictures/'".$prodId."'",0777);	}
	
		if ( (($_FILES['myfile']['type'])=='image/png') )
		{	
			//$uploadedFile[] = $datetime_filename.$_POST["bilFieldInter"][$r].'.'.$_FILES['fileFieldInter']['name'][$r];	
			//$uploadedDisplay[] = $_FILES['fileFieldInter']['name'][$r];	
			$uploadedFile = $_FILES["myfile"]["name"];	
			$doc_location_fileApp=$file_path_mfolder_type.basename($_FILES["myfile"]["name"]);
			 
			if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$doc_location_fileApp))
			{
				$savePhoto = $myImageUpload->savePhoto($uploadedFile,$prodId,$prodCat);
				echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Your file failed to upload.');window.location.href='view/displayAdmin.php';</script>";
			}
			else
			{
				echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Your file failed to upload.');window.location.href='view/createAdmin.php';</script>";
			}
		}
	}
	else
	{
		echo "<script LANGUAGE='JavaScript' type='text/javascript'>window.alert('Cannot SAVE PHOTO');window.location.href='../view/boundary/application/irmi_ict/req_list.php';</script>";
	}

?>