function product(activity)
{
	if (activity == "addToCart")
	{
		var size = document.formCart.size.value;
		var quantity = document.getElementById("quantity").value;
		
		if (size.length == "")
		{  alert('Please enter the size.');document.getElementById("destination").focus();return false; }
		
		if (quantity == "")
		{  alert('Please enter the quantity.');document.getElementById("destination").focus();return false; }
		
		document.forms[0].action = '../controller/cart_control.php?activity='+activity;	
		document.forms["formCart"].submit();
	}
	
	else if (activity == "checkout")
	{
		var	adr = document.getElementById("address").value;
		var city = document.getElementById("city").value;
		var state = document.getElementById("state").value;
		var zip = document.getElementById("zip").value;
		var card = document.getElementById("card").value;
		var cname = document.getElementById("cname").value;
		var cnum = document.getElementById("ccnum").value;
		var expmonth = document.getElementById("expmonth").value;
		var expyear = document.getElementById("expyear").value;
		var cvv = document.getElementById("cvv").value;
		
		if (adr.length == 0 || city.length == 0 || state.length == 0 || zip.length == 0 || card.length == 0 || cname.length == 0 || cnum.length == 0 || expmonth.length == 0 || expyear.length == 0 || cvv.length == 0)
		{  alert('Please fill in every column.');document.getElementById("destination").focus();return false; }
		
		document.forms[0].action = '../SportsArrow/controller/cart_control.php?activity='+activity;	
		document.forms["formBilling"].submit();
	}
	
	else if (activity == "deleteProd")
	{
		var confirmation = confirm('Are you sure you want to delete this?');
		if(confirmation)
		{
			document.forms[0].action = '../SportsArrow/controller/cart_control.php?activity='+activity;	
			document.forms["listProd"].submit();
		}
		else
		{
			document.getElementById("destination").focus();
			return false; 
		}		
	}
	else if (activity == "confirmCart")
	{
		document.forms[0].action = '../SportsArrow/controller/cart_control.php?activity='+activity;	
		document.forms["listProd"].submit();
	}
}