<?php  
//connnect to the controller
require("../Controllers/user_controller.php");

require_once("../Controllers/cart_controller.php");

//define variables
$errors = array();

function getIPAdd(){
 if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
  // Check IP from internet.
  $ip = $_SERVER['HTTP_CLIENT_IP'];
 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
  // Check IP is passed from proxy.
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 } else {
  // Get IP address from remote address.
  $ip = $_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}

$ip_add = getIPAdd();


//check if login button was clicked 
if (isset($_POST['ulogin'])){
	
	//grab form details 
	$lemail = $_POST['umail'];
	$lpass = $_POST['upass'];
    $lpass = md5($lpass);

	//check if email exist
	$check_login = get_login_fxn($lemail);
	
	if ($check_login){
		//email exist, continue to password
		//get password from database
		$hash = $check_login['user_pass']; 

		//verify password
		if ($lpass == $hash){
				//set session
				session_start();
				$_SESSION["user_id"] = $check_login['user_id'];
				$_SESSION["user_role"] = $check_login['user_role'];
				$_SESSION["user_email"] = $check_login['user_email'];

				if(isset($_SESSION['notloggedin'])){
                   $updateCart = update_carttoCID_fxn($_SESSION['user_id'], $ip_add);
                   unset($_SESSION['notloggedin']);
                   header("location: ../View/payment.php");    
                }else{
                	$item = carttotalNull_fxn($ip_add);
                	if($item['count'] > 0){
                		$updateCart = update_carttoCID_fxn($_SESSION['user_id'], $ip_add);
                		header("location: ../index.php");
                	}else{
                		header("location: ../index.php");
                	}
                    
                }
		} else{
				//echo appropriate error
			    echo "<script type='text/javascript'> alert('Incorrect email or password');
				window.location.href = 'login.php';
				</script>";
        
		}

	} else{
		//echo appropriate error
		echo "<script type='text/javascript'> alert('Incorrect email or password');
		window.location.href = 'login.php';
		</script>";
		
		
	}
}

?>