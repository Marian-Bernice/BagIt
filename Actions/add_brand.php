<?php
//connect to the product controller
require("../Controllers/product_controller.php");

//initializing variable
$brandErrors = array();

//check if add brand button is clicked
if (isset($_POST['addbrandbtn'])){
    
    //grab form details
    $brandName = $_POST['bname'];
    
    //validate form
    if (empty($brandName)){
        array_push($brandErrors, "Brand Name is required");
    }
    
    if (strlen($brandName) > 100){
        array_push($brandErrors, "Brand Name is too long");
    }
    
    //add brand
    if (count($brandErrors) == 0){
        //insert new brand
        $addBrand = add_brand_fxn($brandName);
        
        if ($addBrand){
            $addSuccess = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  Brand Added Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";

        }else{
            $addFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Brand Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        
        }
    }
    
    
};

$brandIDs = array();
$brandIDs = view_brands_fxn(); 

?>