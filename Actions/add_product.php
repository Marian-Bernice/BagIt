<?php
//connect to the product controller
include_once (dirname(__FILE__)).'/../Controllers/product_controller.php';

//initializing variable
$errors = array();

//check if add product button is clicked
if (isset($_POST['addprodbtn'])){
    
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
     
    //product image
    $target_folder = "../Images/Product/";
    $target_file = $target_folder . basename($_FILES["pimg"]["name"]);
    $ImageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //Check if image has been uploaded
    if (empty($_FILES["pimg"]["name"])){
        array_push($errors, "Product Image is required");
    }else{
    	//Check if the file input is really an image
    	$check = getimagesize($_FILES["pimg"]["tmp_name"]);
    if ($check == false){
    	array_push($errors, "File is not an image");
    }

    //check if the file already exists
    if (file_exists($target_file)){
    	array_push($errors, "File already exists");
    }

    //limit the file size
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
            $addProduct = add_product_fxn($pcat, $pbrand, $pname, $pprice, $pdesc, $target_file, $gender, $stock);
            
            if ($addProduct){
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
    

?>