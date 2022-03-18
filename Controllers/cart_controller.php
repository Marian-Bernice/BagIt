<?php
//connect to the contact class
include_once (dirname(__FILE__)).'/../Classes/cart_class.php';


/**
*add to cart function 
*takes the product id, ip address, user id and quantity
*/
function add_to_cart_fxn($a, $b, $c, $d){
	//create an instance of cart class
	$newcart_object = new cart_class();
	
	//run the add cart method
	$add_to_cart = $newcart_object->add_to_cart($a, $b, $c, $d);
	if ($add_to_cart){
		//return query result
		return $add_to_cart;
	}else{
		return false;
	}
}


/**
*add to cart without logging in function 
*takes the product id, ip address and quantity
*/
function addtocartNull_fxn($a, $b, $c){
    //create an instance of cart class
    $newcart_object = new cart_class();

    //run the add cart method
    $add_to_cart = $newcart_object->addtocartNull($a, $b, $c);
	if ($add_to_cart){
		//return query result
		return $add_to_cart;
	}else{
		return false;
	}
}


/**
*check for duplicates function
*takes the product id and and user id
*/
function duplicates_fxn($a, $b){
    //create an instance of cart class
    $newcart_object = new cart_class();

    //run the check duplicates method
    $checkduplicates = $newcart_object->duplicates($a, $b);
    if ($checkduplicates){

        $record = $newcart_object->db_fetch();
        if (!empty($record['p_id']) && !empty($record['c_id'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


/**
*check for duplicates when not logged in function 
*takes the product id and and ip address
*/
function duplicateNull_fxn($a, $b){
    //create an instance of cart class
    $newcart_object = new cart_class();
	
	//run the check duplicates method
    $checkduplicates = $newcart_object->duplicateNull($a, $b);

    if ($checkduplicates){
        $record = $newcart_object->db_fetch();
        if (!empty($record['p_id']) && !empty($record['ip_add'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


/*
view cart function
*/
function view_cart_fxn($a){
    //create an instance of cart class
    $cart_object = new cart_class();
    
    //run the select all brands method
    $cart_records = $cart_object->view_cart($a);
    if ($cart_records){
        
        $cart = array();
        
        while($record = $cart_object->db_fetch()){
            $cart[] = $record;
        }
        //return the array
        return $cart;    
    }else{
        return false;
    }
    
}


/*
view cart without logging in function
*/
function viewcartNull_fxn($a){
    //create an instance of cart class
    $cart_object = new cart_class();

    //run the select all brands method
    $cart_records = $cart_object->viewcartNull($a);
    if ($cart_records){
         
        $cart = array();

        while($record = $cart_object->db_fetch()){
          $cart[] = $record;
        }
        //return the array
        return $cart;   
    }else{ 
        return false;
    }
    
}


/*
*total number of items in the cart function
*/
function carttotal_fxn($a){
    //create an instance of cart class
    $cart_object = new cart_class();

    //run the total number of items in the cart method
    $carttotal = $cart_object->cart_total($a);
    if($carttotal){
        $total = $cart_object->db_fetch();
        return $total;
    }else{
        return false;
    }
}


/*
*total number of items in the cart without users logging in function
*/
function carttotalNull_fxn($a){
    //create an instance of cart class
    $cart_object = new cart_class();

    //run the total number of items in the cart without logging in method
    $carttotal = $cart_object->cart_totalNull($a);
    if($carttotal){
        $total = $cart_object->db_fetch();
        return $total;
    }else{
        return false;
    }
}

/**
*remove from cart function 
*/
function remove_from_cart_fxn($a,$b){
    //create an instance of the class
    $cart_object = new cart_class();
    
    //run the remove from cart method
    $remove_from_cart = $cart_object->remove_from_cart($a,$b);
    if($remove_from_cart){
        //return query result
        return $remove_from_cart;
    }else{
        return false;
    }
}


/**
*remove from cart without logging in function 
*/
function remove_from_cartNull_fxn($a,$b){
    //create an instance of the class
    $cart_object = new cart_class();
    
    //run the remove from cart method
    $remove_from_cart = $cart_object->remove_from_cartNull($a,$b);
    if($remove_from_cart){
        //return query result
        return $remove_from_cart;
    }else{
        return false;
    }
}


/**
*manage quantity in cart function 
*takes the user id, product id and quantity
*/
function manage_quantity_fxn($a, $b, $c){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the manage quantity method
    $manage_quantity = $cart_object->manage_quantity($a, $b, $c);
    if ($manage_quantity){
        //return query result
        return $manage_quantity;
    }else{
        return false;
    }
}


/**
*manage quantity in cart without logging in function 
*takes the IP address, product id and quantity
*/
function manageqtyNull_fxn($a, $b, $c){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the manage quantity method
    $manage_quantity = $cart_object->manageqtyNull($a, $b, $c);
    if ($manage_quantity){
        //return query result
        return $manage_quantity;
    }else{
        return false;
    }
}


/**
*total amount in cart function 
*/
function cart_value_fxn($a){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $cartvalue = $cart_object->cart_value($a);
    if ($cartvalue){
        $total = $cart_object->db_fetch();
        return $total;
    }else{
        return false;
    }
}


/**
*total amount in cart without logging in function 
*/
function cart_valueNull_fxn($a){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $cartvalue = $cart_object->cart_value($a);
    if ($cartvalue){
        $total = $cart_object->db_fetch();
        return $total;
    }else{
        return false;
    }
}


/**
*update cart to CID function 
*/
function update_carttoCID_fxn($a, $b){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $update_cartCID = $cart_object->update_carttoCID($a, $b);
    if ($update_cartCID){
        return $update_cartCID;
    }else{
        return false;
    }
}


/**
*add order function 
*/
function add_order_fxn($a, $b, $c, $d){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $addorder = $cart_object->add_order($a, $b, $c, $d);
    if ($addorder){
        return $addorder;
    }else{
        return false;
    }
}


/**
*add order details function 
*/
function add_orderDetails_fxn($a, $b, $c){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $addorderdetails = $cart_object->add_orderDetails($a, $b, $c);

    if ($addorderdetails){
        return $addorderdetails;
    }else{
        return false;
    }
}


/**
*add payment function 
*/
function add_payment_fxn($a, $b, $c, $d, $e){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $addpayment = $cart_object->add_payment($a, $b, $c, $d, $e);
    if ($addpayment){
        return $addpayment;
    }else{
        return false;
    }
}


/**
*recent order function 
*/
function recent_order_fxn(){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $recentorder = $cart_object->recent_orders();
    if($recentorder){
        $recent = $cart_object->db_fetch();
        return $recent;
    }else{
        return false;
    }
}


/**
*delete cart after payment function 
*/
function delete_cartap_fxn($a){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $deletecart = $cart_object->delete_cartap($a);
    if ($deletecart){
        return $deletecart;
    }else{
        return false;
    }
}


/**
*get order function 
*/
function get_order_fxn($a){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $get_order = $cart_object->get_order($a);
    if($get_order){
        $ord_arr = $cart_object->db_fetch();
        return $ord_arr;
    }else{
        return false;
    }
}


/**
*get order details function 
*/
function get_orderDetails_fxn($a){
    //create an instance of the class
    $cart_object = new cart_class();

    //run the method
    $getorderdetails = $cart_object->get_orderDetails($a);
    if($getorderdetails){
        while($record = $cart_object->db_fetch()){
            $ord_arr[] = $record;
        }
        return $ord_arr;
    }else{
        return false;
    }
}


/**
*update stock function 
*/
function update_stock_fxn($a, $b){
    //create an instance of the class
    $cart_object = new cart_class();
    
    $update_stock = $cart_object->update_stock($a, $b);
    if($update_stock){
        return $update_stock;
    }else{
        return false;
    }
}


/**
*get stock function 
*/
function get_stock_fxn($a){
    //create an instance of the class
    $cart_object = new cart_class();
    
    $get_stock = $cart_object->get_stock($a);
    if($get_stock){
        $stock = $cart_object->db_fetch();
        return $stock;
    }else{
        return false;
    }
}

?>