<?php
//connect to the product controller
require("../Controllers/product_controller.php");

//get item to delete
$delItem = $_GET['id'];

//delete item
$delete = delete_product_fxn($delItem);

if ($delete){
    header("location: ../View/view_product.php");
}else{
    echo "Delete failed";
}
?>