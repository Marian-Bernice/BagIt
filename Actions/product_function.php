<?php
//connect to the product controller
require("../Controllers/product_controller.php");

$limit = 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$product = array();
$product = display_products_fxn($start, $limit);
$productCount = productrowcount_fxn();
$pages = ceil($productCount['id']/$limit);

?>