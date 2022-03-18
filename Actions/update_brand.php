<?php
//connect to the product controller
require("../Controllers/product_controller.php");

//grab form details
$brandid = $_GET['bid'];
$brandname = $_GET['bname'];
$brandErrors = array();

//check if upate button was clicked
if(isset($_POST['updbrandbtn'])){
    $newName = $_POST['brandName'];
    //validate form
    if (empty($newName)){
        array_push($brandErrors, "Brand Name is required");
    }
    
    if (strlen($newName) > 100){
        array_push($brandErrors, "Brand Name is too long");
    }

    
    //update brand
    if (count($brandErrors) == 0){
        //update brand name
        $updateBrand = update_brand_fxn($brandid, $newName);
        
        if($updateBrand){
            header("Location: ../Admin/view_brand.php");
            $updateSucces = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  Brand Updated Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";

        }else{
            $updateFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Brand Update Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Brand</title>
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

    <!--Update Brand Form-->
      <section class="Form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="../Images/Login.jpeg" class="img-fluid"> 
          </div>

          <div class="col-lg-7 px-5 pt-5">
              <?php echo "<h4 id='title'>Update ".$brandname. "</h4>" ?>  
            <form method="post">
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Brand Name" class="form-control my-3 p-4" required="required" name="brandName">
                </div>
              </div> 
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="submit" class="btn1 mt-3 mb-3" name="updbrandbtn" id="updbrandbtn">Update Brand</button>
                </div> 
              </div>          
            </form>
          <div class="form-row">
            <div class="col-lg-7">
              <a href="../Admin/view_brand.php"><button class="btn1">Back To Brand</button></a>
            </div>
          </div>  
          </div>

        <?php
          
        if(!empty($brandErrors)){
          foreach($brandErrors as $error){
            echo "\n<div class='alert alert-danger' role='alert'>".$error."</div>";
          }
        }
          
        if (isset($updateSucces)){
          echo $updateSucces;
          }else if(isset($updateFailed)){
            echo $updateFailed;
        }  
            
        ?>
      
     </div>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>