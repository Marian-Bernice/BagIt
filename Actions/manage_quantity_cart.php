<?php
//connect to the cart controller
require("../Controllers/cart_controller.php");



//check if form submit is clicked
if(isset($_GET['submit1'])){
    //navigation bar
    include("../navigation_bar.php");
    //grab details
    $pid = $_GET['p_id'];
    $qty = $_GET['qty'];
    $stock = get_stock_fxn($pid);
        
    if(($stock['stock'] - $qty)>= 0){
        unset($_SESSION['stock_msg']);
        $r_qty = $stock['stock'] - $qty;

        
        //start session
        //session_start();
        if (isset($_SESSION['user_id'])){
            $cid = $_SESSION['user_id'];
            $manageqty = manage_quantity_fxn($cid, $pid, $qty);
            if($manageqty){
                header("location: ../View/cart.php?success=".$r_qty."");
                // echo "<script> alert('Cart quantity updated');
                // window.history.back();
                // </script>";
            }else{ 
                echo "Failed to update quantity";
            }
        }else{
            $ipadd = getIPAdd();
            $manageqty = manageqtyNull_fxn($ipadd, $pid, $qty);
            if($manageqty){
                header("location: ../View/cart.php?success=".$manageqty."");
                // echo "<script>alert('Cart quantity updated');
                // window.history.back();
                // </script>";
            }else{
                echo "Failed to update quantity";
            }
        }

    }else{ 
          header("location: ../View/cart.php?stock_msg=".$stock['stock']."");
    }
}
?>
