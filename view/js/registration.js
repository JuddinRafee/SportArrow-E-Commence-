function validateUser(activity)
{
	if (activity == "signUp")
	{
		var username= document.getElementById("username").value;
		var pwd = document.getElementById("password").value;
		var pwd2 = document.getElementById("password2").value;
		var fullname = document.getElementById("fullname").value;
		var email = document.getElementById("email").value;
		
		if( pwd != pwd2 )
		{	
			alert("Password not matched!");
			return false; 
		}
			
		/*if (username.length == 0 || pwd.length == 0 || pwd2.length == 0 || fullname.length == 0 || email.length == 0 || gender.length == 0 || usertype.length == 0 )
		{  alert('Please fill in every column.');document.getElementById("destination").focus();return false; }*/
		
		document.forms[0].action = '../SportsArrow/controller/authorization_control.php?activity='+activity;
		document.forms["formSignup"].submit();
	}	
	
	else if (activity == "login")
	{	
		var username= document.getElementById("userName").value;
		var pwd = document.getElementById("userPass").value;
			
		if (username.length == 0 || pwd.length == 0)
		{  alert('Please fill in every column.');document.getElementById("destination").focus();return false; }
		
		document.forms[0].action = '../SportsArrow/controller/authorization_control.php?activity='+activity;	
		document.forms["formLogin"].submit();
	}	
}