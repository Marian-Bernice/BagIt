<?php
//connect to the add brand process file
include("../Actions/add_category.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
  </head>

  <body>
    <?php

    //redirect if user is not an admin
    session_start();
    if($_SESSION['user_role'] !=1){
        header('location: ../Login/login.php');
    }
    ?>

  	<!--Logo-->
    <section>
        <div id="logo" class="logo_area">
            <a href="../index.php"><img src="../Images/logo.png" height="110"></a>
        </div>
    </section>

    <!--Login Form-->
    <section class="Form my-4 mx-5" style="font-family: cursive;">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-lg-5">
    				<img src="../Images/Login.jpeg" class="img-fluid"> 
    			</div>
    			<div class="col-lg-7 px-5 pt-5">
                    <h3>Add Category</h3>
    				<form method="post" action="view_category.php">
    					<div class="form-row">
    						<div class="col-lg-7">
    							<input type="text" placeholder="Category Name" class="form-control my-3 p-4" required="required" name="cname" id="cname">
    						</div>
    					</div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<a href="view_category.php"><button type="submit" class="btn1 mt-3 mb-3" name="addcatbtn" id="addcatbtn">Add Category</button></a>
    						</div> 
    					</div>  
    				</form>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <a href="view_category.php"><button class="btn1">View Category Lists</button></a>
                        </div>
                    </div> 
    			</div>
    		</div>
    	</div>
    </section>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>