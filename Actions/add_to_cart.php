<?php
//connect to the product controller
require("../Controllers/cart_controller.php");

//grab details
$pid = $_GET['pid']; 
$ipadd = $_GET['ipadd'];
$cid = $_GET['cid'];
$qty = $_GET['qty'];
$stock = get_stock_fxn($pid);
$r_qty = $stock['stock'] - 1;

if($stock['stock'] > 0){
    //check if user is logged in
    if (empty($cid)){
    	//check for duplicates
        $duplicates = duplicateNull_fxn($pid, $ipadd);
            if ($duplicates){
            ?>

         <script type="text/javascript">
         	alert("Product is already in cart. Increase the quantity in your cart");
            window.history.back();
         </script>

         <?php
         }else{
        	$addtocart = addtocartNull_fxn($pid, $ipadd, $qty);
        	if ($addtocart){
                ?>
                <script type="text/javascript">
                    alert("Product added to cart");
                    window.history.back();
                 </script>
                 <?php
        	}else{
            	echo "something went wrong";
        	}
        }
    }else{
    	$duplicates = duplicates_fxn($pid, $cid);
            if ($duplicates){
            	?>
                <script type="text/javascript">
                	alert("Product is already in cart. Increase the quantity in your cart");
                	window.history.back();
                </script>
                <?php
            }else{
            	$addtocart = add_to_cart_fxn($pid, $ipadd, $cid, $qty);
    			if($addtocart){
            		?>
                <script type="text/javascript">
                    alert("Product added to cart");
                    window.history.back();
                 </script>
                 <?php
        		}else{
           			echo "something went wrong";
        		}
    		}

        }
}else{
    ?>
     <script type="text/javascript">
            alert("Product is out of stock.");
            window.history.back();
         </script>
<?php
}
?>