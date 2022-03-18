<?php  
//connect to the product controller
require("../Controllers/product_controller.php");

if (isset($_GET['id'])){
	//get item to archive
	$id = $_GET['id'];

	//archive item
	$archive = archive_fxn($id);
	if($archive){
		$delete = delete_product_fxn($id); 
		if($delete){
			?>
			<script type="text/javascript">
                alert("Product has been archived");
                window.location.href = "../View/archived.php";
            </script>
        <?php
		}else{
            echo "product clear failed";
        }
    }
}
	
        
?>