<?php
//connect to the add brand process file
include("../Actions/add_category.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Category</title>
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
            <form class='d-flex justify-content-between search-inner' method="get" action="cat_search_result.php">
                <input type='text' class='form-control' id='search_input' placeholder='Search Here' name='csterm'>
                <button type='submit' name="search" class='btn0'>Search</button>
            </form>
        </div>
    </section>

    <!--Category Lists-->
    <section class="Form my-4 mx-5" style="font-family: cursive;">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="../Images/products.jpg" class="img-fluid"> 
          </div>
          <div class="col-lg-7 px-5 pt-5">
             
        <?php
        if(!empty($categoryErrors)){
          foreach($categoryErrors as $error){
            echo "\n<div class='alert alert-danger' role='alert' style='padding-bottom: 10px;'>".$error."</div>";
          }
        }
          
        if (isset($addSuccess)){
            echo $addSuccess;
        }else if(isset($addFailed)){
            echo $addFailed;
        }
          
        echo "<h3 class='text-center' id='title'>View All Categories</h3>";
          
        if (!empty($categories)){
          foreach($categories as $key => $value){ 
            echo "<li class='list-group-item'>". $value ." <a class='btn0' href='../Actions/update_category.php?cid=$key&cname=$value'>Update</a> | <a class='btn0' href='../Actions/delete_category.php?cid=$key'>Delete</a> </li>";
          }
        } 
      ?>
      <a href="category.php"><button type="submit" class="btn1 mt-3 mb-3" name="addcatbtn" id="addcatbtn">Add Category</button></a>

        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>