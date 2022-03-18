<?php
require("../Controllers/product_controller.php");

$ids = array();
$ids = view_productsID_fxn();

$idsno = array();
$idsno = viewproducts_nostock_fxn();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bag List</title>
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
        <div class='container'>
            <form class='d-flex justify-content-between search-inner' method="get" action="adbagsearch.php">
                <input type='text' class='form-control' id='search_input' placeholder='Search Here' name='sterm'>
                <button type='submit' name="search" class='btn0'>Search</button>
            </form>
        </div>
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
          	<h3 class='text-center' id='title'>Bag List</h3>

          	<?php
            foreach($ids as $key => $value){
                echo "<li class='list-group-item'>".$value." &nbsp;&nbsp;&nbsp; <a class='btn0' href='../Actions/update_product.php?id=$key'>Update</a> | <a class='btn0' href='../Actions/archive_product.php?id=$key'>Archive</a></li>";
            }

            ?>

          <br>
            <a href="product.php"><button type="submit" class="btn1 mt-1 mb-1" name="addprodbtn" id="addprodbtn">Add Bag</button></a>
            <a href="archived.php"><button type="submit" class="btn1 mt-1 mb-1" name="addprodbtn" id="addprodbtn">Archives</button></a>

            <br>
            <br>
            <br>
            <?php
            if(empty($idsno)){
            echo "<h2 class='text-center' id='title'>Out of stock</h2>";
            echo "<h6 class='text-center' id='title'>Oh oh, no items are out of stock... :)</h6>";
            } 
            else{
              ?>
            
            <h3 class='text-center' id='title'>Out of Stock</h3>
            <br>
            <?php
            foreach($idsno as $key => $value){
                echo "<li class='list-group-item'>".$value." &nbsp;&nbsp;&nbsp; <a class='btn0' href='../Actions/update_product.php?id=$key'>Update</a> | <a class='btn0' href='../Actions/archive_product.php?id=$key'>Archive</a></li>";
            }}

            ?>
        </div>
      </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>