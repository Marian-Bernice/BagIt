<?php
//connect to the product controller
require("../Controllers/product_controller.php");

//initializing variables
$categories = array();
$categories = view_categories_fxn();
$errors = array();

$brands = array();
$brands = view_brands_fxn();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    
    //create array to store product details
    $productDetails = array();
    $productDetails = returnProduct($id);


//if form has been submitted
if (isset($_POST['updprodbtn'])){
    
    //grab form details
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $pbrand = $_POST['pbrand'];
    $pdesc = $_POST['pdesc'];
    $gender = $_POST['gender'];
    $stock = $_POST['pstock'];

    //validate form
    //product name
    if (empty($pname)){
        array_push($errors, "Product Name is required");
    }
    
    if (strlen($pname) > 200){
        array_push($errors, "Product Name is too long");
    }
    
    //product price
    if (empty($pprice)){
        array_push($errors, "Product Price is required");
    }

    //product category
    if (empty($pcat)){
        array_push($errors, "Product Category is required");
    }
    
    //product brand
    if (empty($pbrand)){
        array_push($errors, "Product Brand is required");
    }

    //product description
    if (strlen($pdesc) > 500){
        array_push($errors, "Product Description is too long");
    } 
    
     
    //checking to see if picture is to be updated
    //check if a new file name is set
    if (!empty($_FILES["pimg"]["name"])){
            //image validation
    $target_folder = "../Images/Product/";
    $target_file = $target_folder . basename($_FILES["pimg"]["name"]);
    $ImageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
    //check if image has been uploaded
    if (empty($_FILES["pimg"]["name"])){
        array_push($errors, "File cannot be empty");
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["pimg"]["tmp_name"]);
    if ($check == false){
        array_push($errors, "File is not an image");
    }
    //check if file already exists
    if (file_exists($target_file)){
        array_push($errors, "File already exists");
    }
    
    //limit file size
    if ($_FILES["pimg"]["size"] > 5000000){
        array_push($errors, "File is too large");
    }
    
    //limit file type
    if ($ImageFileType != "jpg" && $ImageFileType != "png" && $ImageFileType != "jpeg" && $ImageFileType != "gif"){
        array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    }
    
    
    
    //if form is fine
    if (count($errors) == 0){
        $uploadImage = move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
        if ($uploadImage){
            $updateProduct = update_product_fxn($id, $pcat, $pbrand, $pname, $pprice, $pdesc, $target_file, $gender, $stock);
            
            if ($updateProduct){
                header("location: ../View/view_product.php");
            }else{
                $addFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Product Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
            }
        }else{
            $imgfail = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Image Failed to Upload
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }
    }
    //if user isnt uploading new image
    else{
    if (count($errors) == 0){
    
        
            $updateProduct = update_product_fxn($id, $pcat, $pbrand, $pname, $pprice, $pdesc, $productDetails['product_image'], $gender, $stock);
            
            if ($updateProduct){
                header("location: ../View/view_product.php");
            }else{
                $addFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Product Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
            }
        
    }        
    }

}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Product</title>
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

    <!--Update Category Form-->
      <section class="Form my-4 mx-3" style="font-family: cursive">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="../Images/products.jpg" height="1000" class="img-fluid">
          </div>

          <div class="col-lg-7 px-5 pt-3">
            <h4>Update Bag</h4>
            <form method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-lg-7">
                    <input type="text" class="form-control my-2 p-4" name='pname' placeholder="Bag Name" value="<?php echo $productDetails['product_title']?>">
                </div>
              </div> 
              <div class="form-row">
                <div class="col-lg-7">
                    <input type="number" class="form-control my-2 p-4" name="pprice" placeholder="Bag Price (GHC)" value="<?php echo $productDetails['product_price']?>">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                    <select class="form-control my-2 p-2" name="pbrand">
                      <option value="<?php echo $productDetails['brand_id']?>"><?php echo $productDetails['brand_name']?></option>
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
                    <select class="form-control my-2 p-2" name="pcat">
                      <option value="<?php echo $productDetails['cat_id']?>"><?php echo $productDetails['cat_name']?></option>
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
                    <select class="form-control my-2 p-2" name="gender">
                      <option value="<?php echo $productDetails['gender_type']?>"><?php echo $productDetails['gender_type']?></option>
                        <option value="Male">Male<options>
                        <option value="Female">Female<options>
                        <option value="Unspecified">Unspecified<options>
                    </select>
                </div>
              </div> 
              <div class="form-row">
                <div class="col-lg-7">
                    <textarea class="form-control my-2 p-2" placeholder="Description" name="pdesc"><?php echo $productDetails['product_desc']?>
                    </textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="number" placeholder="Stock" class="form-control my-2 p-4" name="pstock" min="0" value="<?php echo $productDetails['stock']?>">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                    <input type="file" class="form-control-file my-1 p-2" name="pimg" id="pimg">
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="submit" name="updprodbtn" id="updprodbtn" class="btn1 mt-0 mb-1">Update Product</button>
                </div> 
              </div>   
            </form>
          <div class="form-row">
            <div class="col-lg-7">
              <a href="../View/view_product.php"><button class="btn1">Back To Product</button></a>
            </div>
          </div>  
          </div>
