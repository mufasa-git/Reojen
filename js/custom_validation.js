//allow only integer values (Nilesh)
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode == 110 || charCode == 190) 
	  return true;	
	if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!= 43) 
	  return false;	
	return true;
}

//phone_no validation
function checkValidPhone($key)
{

}

function UnameCheck(txt)
{
	if(!validatePlus($("#login-username").val()))
	{
		$("#login-username").next('.error').children("p").html('Include your country code(always begins with a + sign)');
		$("#login-username").next('.error').show();
		ee=false;
	}
	else if(!isValidChar($("#login-username").val()))
	{
		$("#login-username").next('.error').children("p").html("Invalid mobile number. Spaces, dashes, hyphens,symbols (except the leading + sign) aren't allowed.");
		$("#login-username").next('.error').show();
		ee=false;
	}
	else if(!Validatephonenumber($("#login-username").val()))
	{
		$("#login-username").next('.error').children("p").html('Invalid mobile number');
		$("#login-username").next('.error').show();
		ee=false;
	}			
}