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
		background-image: url("full.jpg");
	
		/* Full height */
		height: 100%; 
	
		/* Center and scale the image nicely */
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	.bg1 {
		/* The image used */
		background-image: url("view/images/ball.jpg");
	
		/* Full height */
		height: 100%; 
		/* Center and scale the image nicely */
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	.signup{
		width:360px;
		margin:130px;
		font:Cambria,"Hoefler Text","Liberation Serif",Times,"Times New Roman",serif;
		border-radius:70px;
		padding :10px 50px 50px;
		margin-top:0;
		background-color:rgba(0,0,0,0.7);
	}
	
	input[type=text],input[type=password]{
		width:90%;
		padding:5px;
		margin-top:8px;
		border:1px solid #ccc;
		padding-left:5px;
		font-size:16px;
		font-family:arial;
	}
	
	input[type=submit]{
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
	
</style>
<script language="JavaScript" type="text/javascript" src="view/js/registration.js"></script>
</head>

<body>
    <center><div class="bg1">
    <br><br>
    <div class="signup">
    <form name="formSignup" id="formSignup" method="post" enctype="multipart/form-data" action="">
    <p style="font-family:Adobe Fan Heiti Std"><font color="white" size="20px">SIGN UP</p><hr>
    <text style="font-size : 15px; font-family:arial">USERNAME :<input type="text" placeholder="eg:Juddin" name="username" id="username" / required ><br>
    PASSWORD : <input type="password" placeholder="tototo" name="password" id="password"/required ><br>
    RE-TYPE PASSWORD : <input type="password" placeholder="tototo" name="password2" id="password2"/required ><br>
    FULL NAME : <input type="text" placeholder="Mohamad Aizuddin" name="fullname" id="fullname"/required ><br>
    EMAIL : <input type="text" placeholder="jud@gmail.com" name="email" id="email"/required ><br>
    GENDER :
     <input type="radio" name="gender" id="genderM" value="M">Male</input>
     <input type="radio" name="gender" id="genderF" value="F">Female</input><br>
     </text>
     <input type="button"  name="signUp" id="btnSubmit" value="Sign Up" onclick="validateUser('signUp');" />
    </form>
    </font>
    </div>
    </div></center>
</body>
</html>