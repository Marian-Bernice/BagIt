<?php  
//connect to the product controller
require("../Controllers/product_controller.php");

//redirect if user is not an admin
session_start();
if($_SESSION['user_role'] !=1){
    header('location: ../Login/login.php');
}


$archived = view_archive_fxn();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Archives</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
    <link rel="stylesheet" type="text/css" href="../css/custom.css"> 
  </head>

  <body>
    <!--Logo-->
    <section>
        <div id="logo" class="logo_area">
            <a href="../index.php"><img src="../Images/logo.png" height="110"></a>
        </div>
        <br>
        <div class='search_input' id='search_input_box' style="font-family: cursive;"> 
    </section>


    <!--Product Lists-->
    <section class="Form my-4 mx-5" style="font-family: cursive;">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="../Images/products.jpg" class="img-fluid"> 
            <img src="../Images/products.jpg" class="img-fluid">
            <img src="../Images/products.jpg" class="img-fluid"> 
          </div>
          <div class="col-lg-7 px-4 pt-5">
          	<h3 class='text-center' id='title'>Archived Bags</h3>
			<br>
        <?php
		if(empty($archived)){
		?>
	<br>
	<h6 style="font-family: cursive;">You have nothing in your archives. <br><br> Return to Bag Lists :)</h6>
	
	<?php
	}else{
	?>
         <?php
            foreach($archived as $key => $value){
                echo "<li class='list-group-item'>".$value['product_title']." <a class='btn0' href='../Actions/retrieve_product.php?id=".$value['product_id']."'>Retreive</a> | <a class='btn0' href='../Actions/delete_archive.php?id=".$value['product_id']."'>Delete</a></li>";
            }}

            ?>

            <br>
            <a href="view_product.php"><button type="submit" class="btn1 mt-1 mb-1" name="addprodbtn" id="addprodbtn">Bag Lists</button></a>
        </div>
      </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>