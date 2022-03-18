<?php 
//connnect to the controller
require("../Controllers/user_controller.php");

//initializing variable
$errors = array(); 
 
//check if register button was clicked 
if (isset($_POST['uregister'])) {
	
	//grab register form details 
	$lname = $_POST['uname'];
	$lemail = $_POST['umail'];
	$lpass = $_POST['upass'];
    $lconpass = $_POST['upass1'];
	$lcountry = $_POST['ucountry'];
	$lcity = $_POST['ucity'];
	$lcontact = $_POST['uphone'];


//Ensure that form is not empty and is correctly filled
if (empty($lname)){ 
    array_push($errors, "Full Name is required"); 
}
if (empty($lemail)){ 
    array_push($errors, "Email is required"); 
}
if (empty($lpass)){ 
    array_push($errors, "Password is required"); 
}
if (empty($lconpass)){ 
    array_push($errors, "Password is required");
}
    //check if the two passwords match
    if ($lpass != $lconpass){
        array_push($errors, "Passwords do not match");
    }
if (empty($lcountry)){
    array_push($errors, "Country is Required");
}
if (empty($lcity)){
    array_push($errors, "City is Required");
}
if (empty($lcontact)){
    array_push($errors, "Phone Number is Required");
}

//check field lengths
if (strlen($lname) > 100){
    array_push($errors, "Full Name is long");
}
if (strlen($lemail) > 50){
    array_push($errors, "Email is long");
}
if (strlen($lpass) > 150){
    array_push($errors, "Password is long");
}
if (strlen($lcountry) > 30){
    array_push($errors, "Country is long");
}
if (strlen($lcity) > 30){
    array_push($errors, "City is long");
 }
if (strlen($lcontact) > 15){
    array_push($errors, "Phone number is long");
}

//check if email exists
$vemail = verify_mail_fxn($lemail);
if(!empty($vemail)){
    array_push($errors, "Email already exists");
}

//Register user if there are no errors in the form
if (count($errors) == 0){
    //encrypt password before adding to database
    $password = md5($lpass);

    //add new user
        $addUser = add_user_fxn($lname, $lemail, $password, $lcountry, $lcity, $lcontact);
        if ($addUser){
            //echo success and redirect to login page
            echo "<script type='text/javascript'> alert('Successfully Registered');
            window.location.href = 'login.php';
            </script>";
        }else{
            echo "Failed";
        }    
    }else{ 
        echo "<script type='text/javascript'> alert('Registration Failed');              
        window.history.back();
        </script>";
    }  
}

?> 