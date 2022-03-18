<?php
//connect to the product class
include_once (dirname(__FILE__)).'/../Classes/product_class.php';

/**
*add new brand function 
*takes the name
*/
function add_brand_fxn($a){
	//create an instance of product class
	$newbrand_object = new product_class();
	
	//run the add brand method
	$add_brand = $newbrand_object->add_new_brand($a);
	if ($add_brand){
		//return query result
		return $add_brand;
	}else{
		return false;
	}
}


/*
display all brands function
*/
function view_brands_fxn(){
    //create an instance
    $brand_object = new product_class();
    
    //run the select all brands method
    $brand_records = $brand_object->view_brands();
    
    //check if select worked
    if ($brand_records){
        
        $brands = array();
        
        while($record = $brand_object->db_fetch()){
            $brands[$record['brand_id']] = $record['brand_name'];
        }
        
        //return the array
        return $brands;
        
    }else{
        return false;
    }
    
}


/**
*update a brand function 
*takes the brand id and name 
*/
function update_brand_fxn($a, $b){
	//create an instance of the product class
	$brand_object = new product_class();

	//run the update brand method
	$update_brand = $brand_object->update_a_brand($a, $b); 
	if ($update_brand){
		//return query result
		return $update_brand;
	}else{
		//return false
		return false;
	}
}

/**
*delete a brand function 
*takes the brand id 
*/
function delete_brand_fxn($a){
	//create an instance of the contact class
	$brand_object = new product_class();
	
	//run the delete one contact method
	$delete_brand = $brand_object->delete_a_brand($a); 
	if($delete_brand){
	
	//return query result
		return $delete_brand;
	}else{
	//return false
		return false;
	}
}

/**
*add new product category function 
*takes the name
*/
function add_category_fxn($a){
	//create an instance of the product class
	$newcat_object = new product_class();

	//run the add category method
	$add_category = $newcat_object->add_new_cat($a); 
	if ($add_category){
		//return query result
		return $add_category;
	}else{
		//return false
		return false;
	}
}

/**
*displays all categories function 
*/
function view_categories_fxn(){
    //create an instance of the class
    $newcat_object = new product_class();
    
    //run the display categories method
    $view_categories = $newcat_object->view_categories(); 
    if ($view_categories){
        
        $categories = array();
        
        //loop through the rows
        while($record = $newcat_object->db_fetch()){
            $categories[$record['cat_id']] = $record['cat_name'];
        }
      
        //return array
        return $categories;
    }else{
        return false;
    }
}


/**
*update a category function 
*takes the category id and name 
*/
function update_category_fxn($a, $b){
    //create an instance of the class
    $newcat_object = new product_class();
    
    //run the display categories method
    $update_category = $newcat_object->update_a_category($a, $b); 
    if($update_category){
    	//return query result
        return $update_category;
    }else{
    	//return false
        return false;
    }
}


/**
*delete a category function 
*takes the category id 
*/
function delete_category_fxn($a){
    //create an instance of the class
    $newcat_object = new product_class();
    
    //run the display categories method
    $delete_category = $newcat_object->delete_a_category($a); 
    if($delete_category){
    	//return query result
        return $delete_category;
    }else{
    	//return false
        return false;
    }
}


/**
*add new product function 
*takes the category, brand, title, price, description and image 
*/
function add_product_fxn($a, $b, $c, $d, $e, $f, $g, $h){
	//create an instance of product class
	$newprod_object = new product_class();
	
	//run the add product method
	$add_product = $newprod_object->add_new_product($a, $b, $c, $d, $e, $f, $g, $h);
	if ($add_product){
		//return query result
		return $add_product;
	}else{
		return false;
	}
}


/**
*view product ID function 
*/
function view_productsID_fxn(){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the view product query
    $view_product = $newprod_object->view_productsID();
    if($view_product){
        //create array to store ids
        $ids = array();
        //loop through the select result and store the ids in the array
        while($record = $newprod_object->db_fetch()){
            $ids[$record['product_id']] = $record['product_title'];
        }
        //return the array
        return $ids;
    }else{
        return false;
    }
    
}


/**
*view product ID function 
*/
function viewproducts_nostock_fxn(){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the view product query
    $view_product = $newprod_object->viewproducts_nostock();
    if($view_product){
        //create array to store ids
        $ids = array();
        //loop through the select result and store the ids in the array
        while($record = $newprod_object->db_fetch()){
            $ids[$record['product_id']] = $record['product_title'];
        }
        //return the array
        return $ids;
    }else{
        return false;
    }
    
}


/**
*display all products function 
*/
function display_products_fxn($start, $limit){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the view product query
    $view_allproduct = $newprod_object->display_products($start, $limit);
    if($view_allproduct){
        //create array to store ids
        $viewall = array();
        //loop through the select result and store the ids in the array
        while($record = $newprod_object->db_fetch()){
            $viewall[] = $record;
        }
        //return the array
        return $viewall;
    }else{
        return false;
    }
    
}


/**
*view a product function 
*takes id
*/
function view_one_product_fxn($pin){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the view product query
    $view_oneproduct = $newprod_object->view_one_product($pin);
    if($view_oneproduct){
        //create array to store ids
        $viewone = array();
        //loop through the select result and store the ids in the array
        while($record = $newprod_object->db_fetch()){
            $viewone['cat_name'] = $record['cat_name'];
            $viewone['brand_name'] = $record['brand_name'];
            $viewone['product_title'] = $record['product_title'];
            $viewone['product_price'] = $record['product_price'];
            $viewone['product_desc'] = $record['product_desc'];
            $viewone['product_image'] = $record['product_image']; 
            $viewone['cat_id'] = $record['cat_id'];
            $viewone['brand_id'] = $record['brand_id'];
        }
        //return the array
        return $viewone;
    }else{
        return false;
    }
    
}


/**
*search a product function
*takes the search item
*/
function search_product_fxn($sterm){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the view product query
    $search_product = $newprod_object->search_a_product($sterm);
    if($search_product){
        //create array to store ids
        $searchone = array();
        //loop through the select result and store the ids in the array
        while($record = $newprod_object->db_fetch()){
            $searchone[$record['product_id']] = [$record['product_title'],
                                                 $record['product_image'],
                                                 $record['product_price']];
        }
        //return the array
        return $searchone;
    }else{
        return false;
    }
    
}


/**
*update a product function 
*takes the id, category, brand, title, price, description, image
*/
function update_product_fxn($a, $b, $c, $d, $e, $f, $g, $h, $i){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the update method
    $update_product = $newprod_object->update_a_product($a, $b, $c, $d, $e, $f, $g, $h, $i);
    if($update_product){
        //return query result
        return $update_product;
    }else{
        return false;
    }
}


/**
*return a product's details function 
*/ 
function returnProduct($a){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the select method
    $returnprod = $newprod_object->returnProduct($a);
    if($returnprod){
        //create array
        $productArray = array(); 
        $productArray = $newprod_object->db_fetch();
        
        //return the array
        return $productArray;
    }else{
        return false;
    }
}

/**
*delete product function 
*/
function delete_product_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the delete method
    $delete_product = $newprod_object->delete_a_product($a);
    if($delete_product){
        //return query result
        return $delete_product;
    }else{
        return false; 
    }
}


/**
*product row count function 
*/
function productrowcount_fxn(){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the count method
    $count_product = $newprod_object->product_row_counts();
    if($count_product){
        //return query result
        $countproducts = $newprod_object->db_fetch();
        return $countproducts;
    }else{
        return false;
    }
}


/**
*display bag by category function 
*/
function displaybycat_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class();

    //run the query
    $displaycat = $newprod_object->displaybycat($a);
    $catdisplay = array();
    if($displaycat){
        while($record = $newprod_object->db_fetch()){
            $catdisplay[] = $record;
        }
        //return query result
        return $catdisplay;
    }else{
        return false;
    }
}


/**
*shop by category function 
*/
function shopbycat_fxn($cat){
    //create an instance of the class
    $newprod_object = new product_class;

    //run the query
    $catshop = $newprod_object->shop_by_cat($cat);
    $product = array();
    if($catshop){
        while($record = $newprod_object->db_fetch()){
            $product[] = $record;
        }
        return $product;
    }else{
        return false;
    }
}


/**
*shop by category function 
*/
function shopbybrand_fxn($brand){
    //create an instance of the class
    $newprod_object = new product_class;

    //run the query
    $brandshop = $newprod_object->shop_by_brand($brand);
    $product = array();
    if($brandshop){
        while($record = $newprod_object->db_fetch()){
            $product[] = $record;
        }
        return$product;
    }else{
        return false;
    }
}


/**
*shop by gender function 
*/
function shopbygender_fxn($gender){
    //create an instance of the class
    $newprod_object = new product_class;

    //run the query
    $gendershop = $newprod_object->shop_by_gender($gender);
    $product = array();
    if($gendershop){
        while($record = $newprod_object->db_fetch()){
            $product[] = $record;
        }
        return $product;
    }else{
        return false;
    }
}


/**
*add review function
*/
function add_review_fxn($a, $b, $c, $d, $e){
    //create an instance of the class
    $newprod_object = new product_class;

    //run the query
    $review = $newprod_object->add_review($a, $b, $c, $d, $e);

    if($review){
        return $review;
    }else{
        return false;
    }
}


/**
*display review function
*/
function display_reviews_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class;

    //run the query
    $review = $newprod_object->display_reviews($a);
    $review_arr = array();
    if($review){
        while($record = $newprod_object->db_fetch()){
            $review_arr[] = $record;
        }
        return $review_arr;
    }else{
        return false;
    }
}


/**
*count number of review functions
*/
function count_review_rows_fxn(){
    //create an instance of the class
    $newprod_object = new product_class;

    //run the query
    $review = $newprod_object->count_review_rows();
    $review_arr = array();
    if($review){
        while($record = $newprod_object->db_fetch()){
            $review_arr = $record;
        }
        return $review_arr;
    }else{
        return false;
    }
}


/**
*delete review functions
*/
function delete_review_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class;

    //run the query
    $review = $newprod_object->delete_review($a);
    if($review){
        return $review;
        }    
    else{
        return false;
    }
}


/**
*search a brand function
*takes the search item
*/
function search_brand_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the view product query
    $search_brand = $newprod_object->search_a_brand($a);
    if($search_brand){
        //create array to store ids
        $searchone = array();
        //loop through the select result and store the ids in the array
        while($record = $newprod_object->db_fetch()){
            $searchone[] = $record;
        }
        //return the array
        return $searchone;
    }else{
        return false;
    }
    
}


/**
*search a category function
*takes the search item
*/
function search_cat_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class();
    
    //run the search cat query
    $search_cat = $newprod_object->search_a_cat($a);
    if($search_cat){
        //create array to store ids
        $searchone = array();
        //loop through the select result and store the ids in the array
        while($record = $newprod_object->db_fetch()){
            $searchone[] = $record;
        }
        //return the array
        return $searchone;
    }else{
        return false;
    }
    
}


/**
*archive product function
*/
function archive_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class();

    //run the archive product query
    $archive_prod = $newprod_object->archive($a);
    if($archive_prod){
        return $archive_prod; 
    }else{
        return false; 
    }

}


/**
*retrieve archived function
*/
function retrieve_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class();

    //run the retrieve archived product query
    $retrieve = $newprod_object->retrieve($a);
    if ($retrieve){
        return $retrieve;
    }else{
        return false;
    }
}


/**
* delete archived product function
*/
function delete_archive_fxn($a){
    //create an instance of the class
    $newprod_object = new product_class();

    //run the delete archived product query
    $delete= $newprod_object->delete_archive($a);
    if($delete){
        return $delete;
    }else{
        return false;
    }
}


/**
* view archived function
*/
function view_archive_fxn(){
    //create an instance of the class
    $newprod_object = new product_class();

    //run the view customer method
    $viewarch = $newprod_object->view_archived();
    if ($viewarch) {
        //create array v
        $arch = array();
        //loop through the select result and store the ids in the array
        while ($record = $newprod_object->db_fetch()){
            $arch[] = $record;
        }
        //return the array
        return $arch;
    }else{
        return false;
    } 
}


/**
* view paid product function
*/
function view_orders_fxn(){
    //create an instance of the class
    $newprod_object = new product_class();

    //run the view customer method
    $vieword = $newprod_object->view_orders();
    if ($vieword) {
        while ($record = $newprod_object->db_fetch()){
            $ord[] = $record;
        }
        //return the array
        return $ord;
    }else{
        return false;
    }

}

?>