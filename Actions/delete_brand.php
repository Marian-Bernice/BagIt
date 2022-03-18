<?php
//connect to the product controller
require("../Controllers/product_controller.php");

//get item to delete
$delItem = $_GET['bid'];

//delete item
$delete = delete_brand_fxn($delItem);

if ($delete){
    header("location: ../Admin/view_brand.php");
}else{
    echo "Delete failed";
}
?>