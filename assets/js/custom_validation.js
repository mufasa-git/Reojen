//allow only integer values (Nilesh)
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode == 110 || charCode == 190 ||charCode == 46) 
	  return true;	
	if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!= 43 ) 
	  return false;	
	return true;
}