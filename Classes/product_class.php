<?php
//connect to database class
include_once (dirname(__FILE__)).'/../Settings/db_class.php';


/**
*Product class to handle everything product related
*/
/**
 *@author Marian-Bernice Haligah
 *
 */
class product_class extends db_connection
{
	/**
	*method to add new brand 
	*takes the brand name
	*/
	public function add_new_brand($a){

		//write the sql query to add new brand
		$sql = "INSERT INTO `brands`(`brand_name`) VALUES ('$a')";
		
		//return the executed the query
		return $this->db_query($sql);
	}

	
	/**
    *method to view all brands
	*/
	public function view_brands(){

		//write the sql query to view all brands
		$sql = "SELECT * FROM `brands`";

		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method to update a brand
	*takes the brand id and name
	*/
	public function update_a_brand($a, $b){
		
		//write the sql query to update brand
		$sql = "UPDATE `brands` SET `brand_name`='$b'  WHERE `brand_id`= '$a'";
		
		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method to delete a brand
	*takes the id
	*/
	public function delete_a_brand($a){

		//write the sql query to delete brand
		$sql = "DELETE FROM `brands` WHERE brand_id = '$a' ";

		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method to add new product category 
	*takes the category name 
	*/
	public function add_new_cat($a){
		
		//write the sql query to add new prodcut category
		$sql = "INSERT INTO `categories`(`cat_name`) VALUES ('$a')";
		
		//return the executed the query
		return $this->db_query($sql);
	}


	/**
    *method to view all categories
	*/
    public function view_categories(){
        
        //sql query
        $sql = "SELECT * FROM `categories`";

        //return the executed the query
		return $this->db_query($sql);
    }


    /**
    *method to update a category
    *takes the category name and id
	*/
    public function update_a_category($a, $b){
        //write the sql query to update category
        $sql = "UPDATE `categories` SET `cat_name`='$b' WHERE `cat_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }

    
    /**
    *method to delete a category
    *takes the category id
	*/
    public function delete_a_category($a){
        //write the sql query to delete category
        $sql = "DELETE FROM `categories` WHERE `cat_id` = '$a'";

         //return the executed the query
        return $this->db_query($sql);
    }


	/**
	*method to add new product
	*takes the category, brand, title, price, description and image
	*/
	public function add_new_product($a, $b, $c, $d, $e, $f, $g, $h){
		
		//write the sql query to add product
		$sql = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `gender_type`, `stock`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h')";
		
		//return the executed the query
		return $this->db_query($sql);
	}


	/**
	*method to view product ID
	*takes the id and title 
	*/
    public function view_productsID(){
        //write the sql query to view all products
        $sql = "SELECT `product_id`, `product_title` FROM `products` WHERE stock > 0";

        //return the executed the query
		return $this->db_query($sql);
    }

    /**
	*method to view product ID where stock = 0
	*takes the id and title 
	*/
    public function viewproducts_nostock(){
        //write the sql query to view all products
        $sql = "SELECT `product_id`, `product_title` FROM `products` WHERE stock = 0";

        //return the executed the query
		return $this->db_query($sql);
    }


    /**
	*method to display all products
	*/
    public function display_products($start, $limit){
    	//write the sql query to display all products
        $sql = "SELECT brands.brand_name, categories.cat_name, products.product_id,
        products.product_title, products.product_price, products.product_desc, products.product_image
        FROM `products`
        JOIN brands ON (products.product_brand = brands.brand_id)
        JOIN categories ON (products.product_cat = categories.cat_id)
        LIMIT $start, $limit
        ";
        //return the executed the query
        return $this->db_query($sql);
    }
    


    /**
	*method to view one product based on id
	*takes id
	*/
	public function view_one_product($pa){
		//write the sql query to view one product based on id
		$sql = "SELECT brands.brand_name, brands.brand_id, categories.cat_name, categories.cat_id,
		products.product_title, products.product_price, products.product_desc, products.product_image
		FROM `products`
		JOIN brands ON (products.product_brand = brands.brand_id)
		JOIN categories ON (products.product_cat = categories.cat_id)
		WHERE products.product_id = '$id'";

		//return the executed the query
		return $this->db_query($sql);
	}


    /**
	*method to search for product
	*takes the search term
	*/
	public function search_a_product($sterm){
		//write the sql query to search product matching term
		$sql = "SELECT * FROM `products` WHERE `product_title` LIKE '%$sterm%'";

		//return the executed the query
		return $this->db_query($sql); 
	}


    /**
	*method to update a product
	*takes the id, category, brand, title, price, description, image
	*/
    public function update_a_product($a, $b, $c, $d, $e, $f, $g, $h, $i){
    	//write the sql query to update a product
        $sql = "UPDATE `products` SET `product_cat`='$b',`product_brand`='$c',`product_title`='$d',`product_price`='$e',`product_desc`='$f',`product_image`='$g', `gender_type`='$h', `stock`='$i' WHERE `product_id` = '$a'";

        //return the executed the query
        return $this->db_query($sql);
    }

    
    /**
	*method to return product
	*/
    public function returnProduct($a){
    	//write the sql query to return product
        $sql = "SELECT `brands`.`brand_name`, `brands`.`brand_id`, `categories`.`cat_name`, `categories`.`cat_id`,
		`products`.`product_title`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`, `products`.`gender_type`, `products`.`stock`
		FROM `products`
		JOIN brands ON (`products`.`product_brand` = `brands`.`brand_id`)
		JOIN categories ON (`products`.`product_cat` = `categories`.`cat_id`)
		WHERE `products`.`product_id` = '$a'";

		//return the executed the query
        return $this->db_query($sql);
    }

    
    /**
	*method to delete a product
	*/
    public function delete_a_product($a){
    	//write the sql query to delete a product
        $sql = "DELETE FROM `products` WHERE `product_id` = '$a'";

        //return the executed the query
        return $this->db_query($sql);
    }

    /**
	*method to count the products in the database for pagination
	*/
    public function product_row_counts(){
    	//write the sql query to count the products in the database for pagination
        $sql = "SELECT count(`product_id`) AS id FROM `products`";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to display bag by categories
    */
    public function displaybycat($a){
        $sql = "SELECT `brands`.`brand_name`, `brands`.`brand_id`, `categories`.`cat_name`, `categories`.`cat_id`, `products`.`product_title`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`, `products`.`gender_type`, `products`.`stock`, `products`.`product_id`
            FROM `products`
            JOIN brands ON (`products`.`product_brand` = `brands`.`brand_id`) 
            JOIN `categories` ON (`products`.`product_cat` =`categories`.`cat_id`) 
            WHERE `cat_id` ='$a'";
        return $this->db_query($sql);
    }


    /**
	*method to shop by category
	*/
    public function shop_by_cat($cat){
    	//write the sql query to shop by category
        $sql = "SELECT `brands`.`brand_name`, `brands`.`brand_id`, `categories`.`cat_name`, `categories`.`cat_id`, `products`.`product_title`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`, `products`.`gender_type`, `products`.`stock`, `products`.`product_id`
        	FROM `products`
        	JOIN brands ON (`products`.`product_brand` = `brands`.`brand_id`) 
        	JOIN `categories` ON (`products`.`product_cat` =`categories`.`cat_id`) 
        	WHERE `products`.`product_cat`='$cat'";

        //return the executed the query
        return $this->db_query($sql);
    }
    


    /**
	*method to shop by category
	*/
    public function shop_by_brand($brand){
    	//write the sql query to shop by category
        $sql = "SELECT `brands`.`brand_name`, `brands`.`brand_id`, `categories`.`cat_name`, `categories`.`cat_id`, `products`.`product_title`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`, `products`.`gender_type`, `products`.`stock`, `products`.`product_id`
         	FROM `products` 
         	JOIN brands ON (`products`.`product_brand` = `brands`.`brand_id`) 
        	JOIN `categories` ON (`products`.`product_cat` =`categories`.`cat_id`) 
        	WHERE `products`.`product_brand`='$brand'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
	*method to shop by gender
	*/
    public function shop_by_gender($gender){
    	//write the sql query to shop by gender
        $sql = "SELECT `brands`.`brand_name`, `brands`.`brand_id`, `categories`.`cat_name`, `categories`.`cat_id`, `products`.`product_title`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`, `products`.`gender_type`, `products`.`stock`, `products`.`product_id`
         	FROM `products` 
         	JOIN brands ON (`products`.`product_brand` = `brands`.`brand_id`) 
        	JOIN `categories` ON (`products`.`product_cat` =`categories`.`cat_id`) 
        	WHERE `products`.`gender_type`='$gender'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
	*method to add review
	*/
    public function add_review($a, $b, $c, $d, $e){
    	//write the sql query to add review
        $sql = "INSERT INTO `product_review`(`user_id`, `product_id`, `review`, `title`, `date`) VALUES ('$a', '$b', '$c', '$d', '$e')";
        
        //return the executed the query
        return $this->db_query($sql);
    }
    

    /**
	*method to display reviews
	*/
    public function display_reviews($a){
    	//write the sql query to display all reviews
        $sql = "SELECT `review_id`, `product_id`, `review`, `title`, `date`, `user`.`user_name`, `user`.`user_id` FROM `product_review` JOIN `user` ON (`product_review`.`user_id` = `user`.`user_id`) WHERE `product_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }
    

    /**
	*method to for counting reviews
	*/
    public function count_review_rows(){
    	//write the sql query to count reviews
        $sql = "SELECT count(`review_id`) AS reviews FROM `product_review`";

        //return the executed the query
        return $this->db_query($sql);
    } 
    

    /**
	*method to for delete reviews
	*/
    public function delete_review($a){
    	//write the sql query to delete review
        $sql = "DELETE FROM `product_review` WHERE `review_id`='$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to search for brand
    *takes the search term
    */
    public function search_a_brand($a){
        //write the sql query to search product matching term
        $sql = "SELECT * FROM `brands` WHERE `brand_name` LIKE '%$a%'";

        //return the executed the query
        return $this->db_query($sql); 
    }


    /**
    *method to search for category
    *takes the search term
    */
    public function search_a_cat($a){
        //write the sql query to search product matching term
        $sql = "SELECT * FROM `categories` WHERE `cat_name` LIKE '%$a%'";

        //return the executed the query
        return $this->db_query($sql); 
    } 


    /**
    *method to archive product
    */
    public function archive($a){
        //write the sql query to archive product
        $sql = "INSERT INTO `archived` SELECT * FROM `products` WHERE `product_id` = '$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to retrieve archived product
    */
    public function retrieve($a){
        //write the sql query to retrieve archived product
        $sql = "INSERT INTO `products` SELECT * FROM `archived` WHERE `product_id` = '$a'";

        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to delete archived product
    */
    public function delete_archive($a){
        //write the sql query to delete archived product
        $sql = "DELETE from `archived` where `product_id` = '$a'";
        
        //return the executed the query
        return $this->db_query($sql);
    }


    /**
    *method to view archived product
    */
    public function view_archived(){
        //write the sql query to view archived product
        $sql = "SELECT * FROM `archived`";

        //return the executed the query
        return $this->db_query($sql);
    }

    /**
    *method to view paid products
    */
    public function view_orders(){
        //write the sql query to view paid products
        $sql = "SELECT `products`.`product_title`, `products`.`product_price`, `orders`.`order_date`, `orderdetails`.`qty`, `orderdetails`.`qty`*`products`.`product_price` as result FROM `orderdetails` 
        JOIN `products` ON (`orderdetails`.`product_id` = `products`.`product_id`)
        JOIN `orders` ON (`orderdetails`.`order_id` = `orders`.`order_id`)";

        //return the executed the query
        return $this->db_query($sql);
    }
}
?>