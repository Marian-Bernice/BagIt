<?php
include("registerprocess.php");
// session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
  </head>

  <body>
    <section>
        <div id="logo" class="logo_area">
            <a href="../index.php"><img src="../Images/logo.png" height="110"></a>
        </div>
    </section>
    <section class="Form my-4 mx-5" style="font-family: cursive;">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-lg-5">
    				<img src="../Images/Login.jpeg" height="500" class="img-fluid" alt=""> 
    			</div>
    			<div class="col-lg-7 px-4 pt-3">
                    <h4>Register</h4>
    				<form method="post">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="Full Name" class="form-control my-2 p-3" required="required" name="uname" id="vname" value="<?php echo (isset($_POST['uname']) ? $_POST['uname'] : ''); ?>" pattern="[A-z\s]+">
                            </div>
                        </div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<input type="email" placeholder="E-mail Address" class="form-control my-2 p-3" required="required" name="umail" id="vmail" value="<?php echo (isset($_POST['umail']) ? $_POST['umail'] : ''); ?>" >
    						</div>
    					</div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<input type="password" placeholder="Password" class="form-control my-2 p-3" required="required" name="upass" id="vpass" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                                <small class="form-text text-muted">**Must consist of at least one letter and number</small>
    						</div> 
    					</div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="Confirm Password" class="form-control my-2 p-3" required="required" name="upass1" id="vpass1">
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="Country" class="form-control my-2 p-3" required="required" name="ucountry" id="vcountry" value="<?php echo (isset($_POST['ucountry']) ? $_POST['ucountry'] : ''); ?>" pattern="[A-z\s]+">
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="City" class="form-control my-2 p-3" required="required" name="ucity" id="vcity" value="<?php echo (isset($_POST['ucity']) ? $_POST['ucity'] : ''); ?>" pattern="[A-z\s]+">
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="number" placeholder="Contact" class="form-control my-2 p-3" required="required" name="uphone" id="vphone" value="<?php echo (isset($_POST['uphone']) ? $_POST['uphone'] : ''); ?>" maxlength="10" min=1>
                            </div> 
                        </div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<button type="submit" class="btn1 mt-2 mb-3" name="uregister" id="uregister">Register</button>
    						</div> 
    					</div> 
    					<p>Already have an account? <a href="login.php" style="text-decoration: none; color: #E9967A;">Login Here</a></p>
    				</form>
    			</div>
    		</div>
    	</div>



        <?php
            if($errors){
                foreach($errors as $error){
                    echo "<script type='text/javascript'> 
                    alert('$error');
                    
                    </script>";
                        }
                    }
       ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
  </body>
</html>