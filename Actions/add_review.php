<?php
require_once("../Controllers/product_controller.php");
$errors = array();
if(isset($_POST['submit'])){
    $subject = $_POST['review_subject'];
    $review = $_POST['product_review'];
    $pid = $_POST['pid'];
    $user_id = $_POST['user_id'];
    $date = date("Y/m/d");
    
    if(strlen($subject) > 100){
        array_push($errors, "Title is too long");
    }
    if(strlen($subject) > 300){
        array_push($errors, "Review is too long");
    }
    if(count($errors) == 0){
        $add_review = add_review_fxn($user_id, $pid, $review, $subject, $date);
        if($add_review){
            header("location: ../View/single_product.php?pid=".$pid);
        }else{
            echo "false";
        }
    }else{
        echo "Failed to add review";
    }
}


?>