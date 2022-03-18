<?php
include_once("../Controllers/product_controller.php");
// include_once("../Settings/core.php");
if(isset($_GET['review_id'])){
    $delete = delete_review_fxn($_GET['review_id']);
    if($delete){
    	echo "<script type='text/javascript'> alert('Review Deleted');
            window.history.back();
            </script>"; 
    }else{
        echo "Review has been deleted";  
    }
}

?>