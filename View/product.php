<?php
//connect to the add product process file
include("../Actions/add_product.php");

$categories = array();
$categories = view_categories_fxn();

$brands = array();
$brands = view_brands_fxn();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Bag</title>
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

    <!--Add Product Form-->
    <section class="Form my-4 mx-3" style="font-family: cursive;">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-lg-5">
    				<img src="../Images/products.jpg" height="1000" class="img-fluid"> 

    			</div>
    			<div class="col-lg-7 px-5 pt-3">
                    <h3>Add Bag</h3>
    				<form method="post" enctype="multipart/form-data">
    					<div class="form-row">
    						<div class="col-lg-7">
    							<input type="text" placeholder="Bag Name" class="form-control my-2 p-4" required="required" name="pname" id="pname">
    						</div>
    					</div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<input type="number" placeholder="Bag Price (GHC)" class="form-control my-2 p-4" required="required" name="pprice" id="pprice" min="1">
    						</div>
    					</div>
    					<div class="form-row">
    						<div class="col-lg-7">
					            <select class="form-control my-2 p-2" id="exampleFormControlSelect1" name="pbrand" required="required">
					            <option value="" selected disabled hidden>Select Brand</option>
					            	<?php
					            		foreach ($brands as $brand => $brandname){
					            			echo "<option value=".$brand.">".$brandname."<options>";
					            		}
					            	?>
					            </select>
					        </div>
					    </div>
					    <div class="form-row">
    						<div class="col-lg-7">
					            <select class="form-control my-2 p-2" id="exampleFormControlSelect1" name="pcat" required="required">
					            <option value="" selected disabled hidden>Select Category</option>
					            	<?php
					            		foreach ($categories as $cat => $catname){
	            							echo "<option value=".$cat.">".$catname."<options>";
					            		}
					            	?>
					            </select>
					        </div>
					    </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <select class="form-control my-2 p-2" id="exampleFormControlSelect1" name="gender" required="required">
                                <option value="" selected disabled hidden>Select Gender</option>
                                    <option value="Male">Male<options>
                                    <option value="Female">Female<options>
                                    <option value="Unisex">Unisex<options>
                                </select>
                            </div>
                        </div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<textarea placeholder="Bag Description" class="form-control my-2 p-2" required="required" name="pdesc" id="pdesc"></textarea>
    						</div>
    					</div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="number" placeholder="Stock" class="form-control my-2 p-4" required="required" name="pstock" id="pstock" min="1">
                            </div>
                        </div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<input type="file" class="form-control-file my-1 p-2" required="required" name="pimg" id="pimg">
    						</div>
    					</div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<a href="view_product.php"><button type="submit" class="btn1 mt-0 mb-1" name="addprodbtn" id="addprodbtn">Add Bag</button></a>
    						</div> 
    					</div>  
    				</form>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <a href="view_product.php"><button class="btn1 mt-1 mb-2">View Bag Lists</button></a>
                        </div>
                    </div>  
    			</div>
    		</div>
    	</div>
    </section>