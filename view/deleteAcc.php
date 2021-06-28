<?php

$con = mysqli_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysqli_select_db($con, "sportsarrow");

$id=$_GET['id'];

$result= mysqli_query($con, "DELETE FROM acc_product WHERE accId=$id");

header("Location: ../view/displayAdmin.php");

?>