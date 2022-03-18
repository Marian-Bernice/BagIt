//function to validate form
//function has already been linked as onclick to the form submit
function regvalidation(){

	//grab form data
	var nameinput = document.getElementById('vname').value;
	var phoneinput = document.getElementById('vphone').value;
	var mailinput = document.getElementById('vmail').value;
	var passinput = document.getElementById('vpass').value;
	var countryinput = document.getElementById('vcountry').value;
	var cityinput = document.getElementById('vcity').value;

	//define regex for name and phone
	var namereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
	var mailreg = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
	var contactreg = /^([0-9]{10,15})$/;
	var passreg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	var countryreg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
	var cityreg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;

	//regex.test
	var testname = namereg.test(nameinput);
	var testmail = mailreg.test(mailinput);
	var testphone = contactreg.test(phoneinput);
	var testpass = passreg.test(passinput);
	var testcountry = countryreg.test(countryinput);
	var testcity = cityreg.test(cityinput);

	//check if there is a match
	//alert result
	if (testname){
		alert("Name is valid");
	}else{
		alert("Name is not valid");
		//use event.preventDefault() to stop form when validation fails
		event.preventDefault();
	}


	if (testmail){
		alert("Mail is valid");
	}else{
		alert("Mail is not valid");
		//use event.preventDefault() to stop form when validation fails
		event.preventDefault();	
	}


	if (testphone){
		alert("Phone Number is valid");
	}else{
		alert("Phone Number is not valid");
		//use event.preventDefault() to stop form when validation fails
		event.preventDefault();	
	}		

	
	if (testpass){
		alert("Password is valid");
	}else{
		alert("Password is not valid");
		//use event.preventDefault() to stop form when validation fails
		event.preventDefault();	
	}


	if (testcountry){
		alert("Country is valid");
	}else{
		alert("Country is not valid");
		//use event.preventDefault() to stop form when validation fails
		event.preventDefault();	
	}


	if (testcity){
		alert("City is valid");
	}else{
		alert("City is not valid");
		//use event.preventDefault() to stop form when validation fails
		event.preventDefault();	
	}

}