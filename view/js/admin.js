function createProd(activity)
{
	if(activity == "addProd")
	{
		var	prodPhoto = document.getElementById("image").value;
		var prodBrands = document.getElementById("brand").value;
		var prodName = document.getElementById("name").value;
		var prodCat = document.formCreate.category.value;
		var prodSize = document.formCreate.size.value;
		var prodPrice = document.getElementById("price").value;
		var prodGender = document.formCreate.gender.value;
		var prodQty = document.getElementById("quant").value;
		
		if (prodPhoto .length == 0 || prodBrands.length == 0 || prodName.length == 0 || prodPrice.length == 0 || prodQty.length == 0)
		{  alert('Please fill in every column 1.');document.getElementById("destination").focus();return false; }
		
		if (prodPhoto == "" || prodCat == ""|| prodSize == "" || prodGender == "")
		{  alert('Please fill in every column 2.');document.getElementById("destination").focus();return false; }
		
		document.forms[0].action = '../controller/admin_control.php?activity=' + activity;
		document.forms["formCreate"].submit();
	}
}