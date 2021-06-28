<!DOCTYPE html>
<html>
<head>

<style>
	body, html {
		height: 100%;
		margin: 0;
	}
	
	.bg {
		/* The image used */
		background-image: url("view/images/full.jpg");
	
		/* Full height */
		height: 100%; 
	
		/* Center and scale the image nicely */
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	
	.login{
		width:360px;
		margin-left:80px;
		font:Cambria,"Hoefler Text","Liberation Serif",Times,"Times New Roman",serif;
		border-radius:70px;
		border:3px solid #ccc;
		padding :1px 45px 50px;
		background-color:rgba(0,0,0,0.6);
	}
	
	input[type=text],input[type=password]{
		width:99%;
		padding:10px;
		margin-top:8px;
		border:1px solid #ccc;
		padding-left:5px;
		font-size:16px;
		font-family:Cambria,"Hoefler Text","Liberation Serif",Times,"Times New Roman",serif;
	}
	
	
	input[type=button]{
		width:26%;
		background-color:#040404;
		color:#fff;
		border:2px solid#fff;
		padding:10px;
		font-size:20px;
		cursor:pointer;
		border-radius:5px;
		margin-bottom:15px;
	
	}
	button{
		width:100%;
		background-color:#040404;
		color:#fff;
		border:2px solid#fff;
		padding:10px;
		font-size:20px;
		cursor:pointer;
		border-radius:5px;
		margin-bottom:15px;
	
	}
	a {
		color:white;
	 	text-decoration:none;
		width:30%;
		background-color:#040404;
		color:#fff;
		border:2px solid#fff;
		padding:10px;
		font-size:20px;
		cursor:pointer;
		border-radius:5px;
		margin-bottom:15px;
		font-family:arial;
	 }
	</style>
    
	<script language="JavaScript" type="text/javascript" src="view/js/registration.js"></script>
	<title>Sports Arrow</title>
    <link rel="shortcut icon" href="view/images/sportsarrow.ico" >
</head>
	
	<body>
	<div class="bg">
	
	<br><br><br><br><br><br><br>
	<div class="login">
	<h1 style="text-align:center;font-size:7;color:white;font-family:Adobe Fan Heiti Std">SIGN IN</h1>
	<form name="formLogin" method="post" style="text-align:center;">
	<input type="text" placeholder="Username" id="userName" name="userName" /required><br/>
	<input type="password" placeholder="Password" id="userPass" name="userPass" /required><br/><br/>
	<input type="button"  name="Login" id="btnSubmit" value="Login" onclick="validateUser('login');" />
    <a href="signup.php">Sign Up</a>
	</form>
    
	</div>
	</div>
</body>

</html>
