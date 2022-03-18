<?php
require_once("../Controllers/cart_controller.php");

//start session
session_start();
//check for status
if(isset($_GET['status'])){
    $status = $_GET['status'];

    if($status == 'completed'){
        // ..code
        $cid = $_SESSION['user_id'];
        $inv_no = mt_rand(10,5000);
        $ord_date = date("Y/m/d");
        $ord_stat = 'unfulfilled';
        $add_order = add_order_fxn($cid, $inv_no, $ord_date, $ord_stat);
        if($add_order){
            $recent = recent_order_fxn();
            $cart = view_cart_fxn($cid);
            foreach($cart as $key => $value){
                echo $value['p_id'];
                echo $value['qty'];
                $add_details = add_orderDetails_fxn($recent['recent'], $value['p_id'], $value['qty']);
                $stock = get_stock_fxn($value['p_id']);
                $r_qty = $stock['stock'] - $value['qty'];
                $update = update_stock_fxn($value['p_id'],$r_qty);
            }

            $amt = cart_value_fxn($cid);
            $currency = "USD";
            $add_payment = add_payment_fxn($amt['Result'], $cid, $recent['recent'], $currency, $ord_date);

            if($add_payment){
                $delete = delete_cartap_fxn($cid);
                if($delete){
                    header("location: ../View/payment_success.php?ord_id=" .$recent['recent']);
                }else{
                    echo "cart delete failed";
                }
            }{
                echo "payment failed";
            }
            
        }else{
                echo "order went wrong";
            }
    }
    
}

?>
