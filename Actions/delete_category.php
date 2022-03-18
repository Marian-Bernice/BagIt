<?php
//connect to the product controller
require("../Controllers/product_controller.php");

//get item to delete
$delItem = $_GET['cid'];

//delete item
$delete = delete_category_fxn($delItem);

if ($delete){
    header("location: ../Admin/view_category.php");
}else{
    echo "Delete failed";
}
?>