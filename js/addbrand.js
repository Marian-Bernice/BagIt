//function to validate form
//function has already been linked as onclick to the form submit
function brandvalidation(){

	//grab form data
	var nameinput = document.getElementById('vname').value;

	//define regex for name and phone
	var namereg = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;

	//regex.test
	var testname = namereg.test(nameinput);

	//check if there is a match
	//alert result
	if (testname){
		alert("Name is valid");
	}else{
		alert("Name is not valid");
		//use event.preventDefault() to stop form when validation fails
		event.preventDefault();
	}

}