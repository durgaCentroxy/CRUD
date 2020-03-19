<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8">	 
<title>Form Auto Fill</title> 
<style>					 
fieldset{ margin-bottom: 5%; }		 
</style> 
</head> 

<body> 
<h1>AutoFill Form</h1>	 
<form> 

//Fields for primary address 
<fieldset>			 
<legend><b>Primary Address</b></legend>	 
<label for ="primaryaddress">Address:</label>		 
<input type = "text" name = "Address" id = "primaryaddress" required><br/> 
<label for = "primaryzip">Zip code:</label>	 
<input type = "text" name = "Zip code" id = "primaryzip"
				pattern = "[0-9]{6}" required><br/> 
</fieldset> 
	
<input type="checkbox" id="same" name="same" onchange= "addressFunction()"/>			 
<label for = "same">If same secondary address select this box.</label> 

// Fields for secondary address 
<fieldset>							 
<legend><b>Secondary Address</b></legend>			 
<label for ="secondaryaddress">Address:</label>	 
<input type = "text" name = "Address" id = "secondaryaddress" required><br/>			 
<label for = "secondaryzip">Zip code:</label>		 
<input type = "text" name = "Zip code" id = "secondaryzip"
				pattern = "[0-9]{6}" required><br/> 
</fieldset> 

// Submit button in the form 
<input type = "submit" value = "Submit"/> 
</form> 

// JavaScript Code 
<script> 
function addressFunction() 
{ 
if (document.getElementById('same').checked) 
{ 
	document.getElementById('secondaryaddress').value=document. 
			getElementById('primaryaddress').value; 
	document.getElementById('secondaryzip').value=document. 
			getElementById('primaryzip').value 
} 
	
else
{ 
	document.getElementById('secondaryaddress').value=""; 
	document.getElementById('secondaryzip').value=""; 
} 
} 
</script> 
</body> 
</html> 
