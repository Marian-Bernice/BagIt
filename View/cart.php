<?php
//connect to the cart controller
require("../Controllers/cart_controller.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css"> 
</head> 
<body>
	<?php
	include('../navigation_bar.php');
	if(isset($_SESSION['user_id'])){
		$cid = $_SESSION['user_id'];
		$cart = view_cart_fxn($cid);
	}else{
		$ipadd = getIPAdd();
		$cart = viewcartNull_fxn($ipadd);
	}
	?> 

	<br>
	<br>
    <br>

	<div class="container" style="font-family: cursive;">
		<h4 class="text-center px-5" style="font-size: 60px">My Cart</h4>
	
	<?php
	if(empty($cart)){
		?>
	<br>
	<center>
	<h4>Your Cart is Empty</h4>
	<br>
	<br>
	<br>
	<a href="all_product.php" class="btn0 mb-2">Continue shopping</a>
	</center>
	<?php
	}else{
		?>

	<?php
	foreach ($cart as $key => $cartitems){ 
	?> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-11 mx-auto">
				<div class="row mt-5 gx-3">
					<!-- left side div -->
					<div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5 shadow">
						<div class="row">
						<!-- cart images div -->
						<div class="col-md-5 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img">
							<img src="<?php echo $cartitems['product_image'] ?>" class="img-fluid" alt="cart img">
						</div> 
						<div class="col-md-7 col-11 mx-auto px-4 mt-2">
							<div class="row"> 
								<div class="col-6 card-title">
									<h5 class="product_name"><?php echo $cartitems['product_title']; ?></h5>
									<p>GHc<?php echo $cartitems['product_price']; ?></p> 
								</div>  
								<form class="form-inline" method="GET" action="../Actions/manage_quantity_cart.php">
									<div class="form-group">
        								<input type="number" class="form-control mb-3" name="qty" min="1" value="<?php echo $cartitems['qty']; ?>">
        								<input type="hidden" name="p_id" value="<?php echo $cartitems['p_id'] ?>">
        							</div> 
						        	<div>
										<button type="submit" name="submit1" class="btn0 mb-2">Manage</button>
									</div>
								</form>
									<div>
										<a href="<?php echo "../Actions/remove_from_cart.php?p_id=".$cartitems['p_id']; ?>"><button type="submit" class="btn0 mb-2">Remove</button></a>
									</div>
							</div> 
						</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<?php }?> 
	<br>
	<br>
	<center>
	<a href="all_product.php" class="btn0 mb-2">Continue shopping</a>
    <a href="payment.php" class="btn0 mb-2">Check-Out</a>
    </center>

<?php }?>

    <?php 
    
        if(isset($_GET['stock_msg'])){
        	echo "<input type='hidden' id='stock_msg' value='Limited stock. Only ".$_GET["stock_msg"]." bags available'>";
        	echo "<script>alert($('#stock_msg').val())</script>";
        	}elseif(isset($_GET['success'])){
        	echo "<input type='hidden' id='succ' value='Cart quantity updated'>";
        	echo "<script>alert($('#succ').val())</script>";
        }
           ?> 

    </div>
    </div>

    

    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

    <!-- Footer -->
	<?php include("../footer.php");?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</body>
</html>	



