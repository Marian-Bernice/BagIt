<?php
//connect to database class
include_once (dirname(__FILE__)).'/../Settings/db_class.php';


/**
*Cart class to handle everything product related
*/
/**
 *@author Marian-Bernice Haligah
 *
 */
class cart_class extends db_connection
{
	/**
	*method to add to cart
	*takes the product id, ip address, user id and quantity
	*/
	public function add_to_cart($a, $b, $c, $d){

		//write the sql query to add to cart
		$sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$a', '$b', '$c', '$d')";
		
		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method to add to cart without logging in
	*takes the product id, ip address and quantity
	*/
    public function addtocartNull($a, $b, $c){

    	//write the sql query to add to cart without logging in
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `qty`) VALUES ('$a', '$b', '$c')";

        //return the executed the query
        return $this->db_query($sql);
    }



    /**
    *method to check for duplicate
    *takes the product id and user id
	*/
    public function duplicates($a, $b){

    	//write the sql query to check for duplicates
        $sql = "SELECT `p_id`, `c_id` FROM `cart` WHERE `p_id`='$a' AND `c_id`='$b'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to check for duplicates without logging in
    *takes the product id and ip address
	*/
    public function duplicateNull($a, $b){

    	//write the sql query to check for duplicates without logging in
        $sql = "SELECT `ip_add`, `p_id` FROM `cart` WHERE `ip_add`='$b' AND `p_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


	/**
    *method to view cart
	*/
	public function view_cart($a){

		//write the sql query to view cart
		$sql = "SELECT `cart`.`p_id`, `cart`.`c_id`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`c_id` = '$a'";

		//return the executed the query
		return $this->db_query($sql);
	}


	/**
    *method to view cart without users logging in
	*/
    public function viewcartNull($a){

    	//write the sql query to view cart without logging in
        $sql = "SELECT `cart`.`p_id`, `cart`.`ip_add`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`ip_add` = '$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


	/**
    *method to get the total number of items in the cart
    */
    public function cart_total($a){

        //write the sql query to view cart
        $sql = "SELECT count(`c_id`) AS `count` FROM `cart` WHERE `c_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to get the total number of items in the cart without users logging in
    */
    public function cart_totalNull($a){

        //write the sql query to view cart without users logging in
        $sql = "SELECT count(`ip_add`) AS `count` FROM `cart` WHERE `ip_add`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to remove from cart
    */
    public function remove_from_cart($a, $b){

        //write the sql query to remove from cart
        $sql = "DELETE FROM `cart` WHERE `c_id`='$a' AND `p_id`='$b'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to remove from cart without users logging in
    */
    public function remove_from_cartNull($a, $b){

        //write the sql query to remove from cart without users logging in
        $sql = "DELETE FROM `cart` WHERE `ip_add`='$a' AND `p_id`='$b'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to manage the quantity in the cart
    *takes the user id, product id and quantity
    */
    public function manage_quantity($a, $b, $c){

        //write the sql query to remove from cart
        $sql = "UPDATE `cart` SET `qty`='$c' WHERE `c_id`='$a' AND `p_id`='$b'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to manage the quantity in the cart without logging in
    *takes the ip address, product id and quantity
    */
    public function manageqtyNull($a, $b, $c){

        //write the sql query to remove from cart
        $sql = "UPDATE `cart` SET `qty`='$c' WHERE `ip_add`='$a' AND `p_id`='$b'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to total amount or value in cart
    */
    public function cart_value($a){

        //write the sql query for total cart value
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`c_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to total amount or value in cart without logging in
    */
    public function cart_valueNull($a){

        //write the sql query for total cart value without logging in
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to update cart with user ID
    */
    public function update_carttoCID($a, $b){

        //write the sql query to update cart with user ID
        $sql = "UPDATE `cart` SET `c_id`='$a' WHERE `ip_add`='$b'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to add to orders
    */ 
    public function add_order($a, $b, $c, $d){

        //write the sql query to add orders
        $sql = "INSERT INTO `orders`(`user_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$a','$b','$c','$d')";
        
        //return the executed the query
        return $this->db_query($sql);
    }

    
    /**
    *method to add to orders details
    */
    public function add_orderDetails($a, $b, $c){

        //write the sql query to add order details
        $sql = "INSERT INTO `orderdetails`(`order_id`, `product_id`, `qty`) VALUES ('$a','$b','$c')";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to add payment
    */
    public function add_payment($a, $b, $c, $d, $e){

        //write the sql query to add payment
        $sql = "INSERT INTO `payment`(`amt`, `user_id`, `order_id`, `currency`, `payment_date`) VALUES ('$a','$b','$c','$d','$e')";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to get the most recent order
    */
    public function recent_orders(){

        //write the sql query to get recent orders
        $sql = "SELECT MAX(`order_id`) as recent FROM `orders`";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to remove cart after payment
    */
    public function delete_cartap($a){

        //write the sql query to delete cart after payment
        $sql = "DELETE FROM `cart` WHERE `c_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to get orders
    */
    public function get_order($a){

        //write the sql query to get orders
        $sql = "SELECT  `user`.`user_name`, `orders`.`order_id`, `orders`.`invoice_no`, `orders`.`order_date`, `orders`.`order_status` FROM `orders` 
        JOIN `user` ON (`user`.`user_id` = `orders`.`user_id`) WHERE `orders`.`order_id` = '$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to get order details
    */
    public function get_orderDetails($a){

        //write the sql query to get order details
        $sql = "SELECT `products`.`product_title`, `products`.`product_image`, `products`.`product_price`, `products`.`stock`, `orderdetails`.`qty`, `orderdetails`.`qty`*`products`.`product_price` as result FROM `orderdetails` 
        JOIN `products` ON (`orderdetails`.`product_id` = `products`.`product_id`) WHERE `order_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to update stock
    */
    public function update_stock($a, $b){

        //write the sql query to update stock
        $sql = "UPDATE `products` SET `stock`='$b' WHERE `product_id`= $a";

        //return the executed the query
        return $this->db_query($sql);
        }


    /**
    *method to get stock
    */
    public function get_stock($a){

        //write the sql query to get stock
        $sql = "SELECT `stock` FROM `products` WHERE `product_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }
}
?>

