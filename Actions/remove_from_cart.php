<?php
//connect to the cart controller
require_once("../Controllers/cart_controller.php");

//navigation bar
include("../navigation_bar.php");

//start session
session_start();
if(isset($_GET['p_id'])){

    $pid = $_GET['p_id'];
    $ipadd = getIPAdd();

    if(isset($_SESSION['user_id'])){
       $cid = $_SESSION['user_id'];
        $delete = remove_from_cart_fxn($cid,$pid);
        if($delete){
            header("location: ../View/cart.php");
        }else{
            echo "something went wrong";
        }
    }else{
       $delete = remove_from_cartNull_fxn($ipadd,$pid);
        if($delete){
            header("location: ../View/cart.php");
        }else{
            echo "something went wrong";
        }
    }

}
else{
    header("location: ../index.php");
}

?>