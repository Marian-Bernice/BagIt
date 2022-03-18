<?php
//connect to the product controller
require("../Controllers/product_controller.php");

//get item to delete
$delItem = $_GET['id'];

//delete item
$delete = delete_archive_fxn($delItem);

if ($delete){
    header("location: ../View/archived.php");
}else{
    echo "Delete failed";
}
?>