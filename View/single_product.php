<?php
require("../Controllers/product_controller.php");
if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $productDetails = returnProduct($pid);
    $catdisplay = displaybycat_fxn($productDetails['cat_id']);
}

else{
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Single Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css"> 
  </head>
  <body>
    <?php include("../navigation_bar.php");
    //get IP address
    $ipadd = getIPAdd();

    //get user ID
    if(isset($_SESSION['user_id'])){ 
        $cid = $_SESSION['user_id'];
    }else{
        $cid = null;
    }
    
    //quantity of items
    $qty = 1;
    
    ?>
    <br>
    <br>
    <br>
    <!-- <center> -->
    <main class="mt-5 pt-4">
    <div class="container col-md-6" style="font-family: cursive;">
    	<div class="row wow fadeIn">
	        <div class="card" style="width: 20rem; align-self: right">
	            <img src="<?php echo $productDetails['product_image'] ?>" width="318" style="float: right;"> 
	        </div>
        <div class="col-md-6 mb-4">
        <br>
	        <h3 style="color: #E9967A;"><?php echo $productDetails['product_title'] ?></h3>
	        <p>Price: Ghc <?php echo $productDetails['product_price'] ?></p>
            <br>
	        <p>Brand: <?php echo $productDetails['brand_name'] ?></p>
            <br>
	        <p>Category: <?php echo $productDetails['cat_name'] ?></p>
            <br>
	        <p>Description: <?php echo $productDetails['product_desc'] ?></p> 
            
	        <a href="<?php echo '../Actions/add_to_cart.php?pid='.$pid.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><button class="btn0 mb-4">Add to Cart</button></a> 
    	</div> 
    	</div> 
	</div>
    <!-- </center> -->
    <br>
    <br>
    <br>


    <!-- Related Bags -->
      <div class="row d-flex justify-content-center wow fadeIn" style="font-family: cursive;">
        <div class="container">
          <center>
          <h4 class="my-4 h4" style="font-size: 30px;">Related Bags</h4>
          </center>
          <hr>
        </div>
      </div>

        <div class="row px-3 py-2" style="font-family: cursive;"> 
               <?php
                    foreach($catdisplay as $key => $value){
                      if($value['product_id'] != $pid){
                        ?>
                      
              <center>
                <div class="col-lg-1 col-md-6 mb-4 mb-lg-0">
                   <!-- Card-->
                   <div class="card" style="width: 20rem;">
                      <img src="<?php echo $value['product_image']; ?>" class="card-img-top" height="300" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $value['product_title']; ?></h5>
                        <p class="card-text">Ghc <?php echo $value['product_price']; ?></p>
                        <center>
                            <a href="single_product.php?pid=<?= $value['product_id']; ?>"><button class="btn0 mb-2">View Bags</button></a>
                            <a href="<?php echo '../Actions/add_to_cart.php?pid='.$value['product_id'].'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><button class="btn0">Add to Cart</button></a>
                        </center>
                      </div>
                    </div>
                    <br>  
                </div>  
              </center>  
                
                <?php
                    }}  
                ?>
          </div>
      </div>

      <br> 
      <br> 

    <!-- Reviews -->

    <div class="row d-flex justify-content-center wow fadeIn">
    <div class="container">
        <?php
            $review = array();
            $review = display_reviews_fxn($pid);
            $productCount = count_review_rows_fxn();
    ?>
    <center>
    <h3 style="font-family: cursive; font-size: 30px;">Reviews</h3>  
    </center>  
    <hr> 
    <ul class="list-unstyled">
    
    <?php
	if(empty($review)){
		?>
	<br>
	<h4 style="font-family: cursive;">No reviews yet...</h4>
	
	<?php
	}else{
		?>

    <?php
      foreach($review as $key => $value){
          ?>

        
  <li class="media">
    <div class="media-body" style="font-family: cursive;">
      <h5 class="mt-0 mb-1" style="font-style: bold;"><?= $value['title'] ?></h5>
      <h8 class="mt-0 mb-1">By: <?= $value['user_name'] ?></h8> 
      <p><?= $value['review'] ?></p>
      <?php
      if(isset($_SESSION['user_id'])){
      if($value['user_id'] == $_SESSION['user_id']){
        ?>
      <a href="<?php echo "../Actions/delete_review.php?review_id=".$value['review_id'] ?>"><button type="submit" class="btn0 mb-2">Delete Review</button></a>
      <br>
      <br>
      
      <?php
      }}
      ?>
    </div>
  </li>
        
        <?php
      }}
    ?>
</ul>
     
    </div>
    <?php
        if(isset($_SESSION['user_id'])){
            
            ?>
    
    <div class="container">

	<section class="Form my-4 mx-5" style="font-family: cursive; border-radius: 30px; box-shadow: 12px 12px 22px grey; box-sizing: border-box; padding: 0;
	margin: 0;">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-lg-5">
    				<img src="../Images/reviews.png" class="img-fluid" style="border-top-left-radius: 30px; border-bottom-left-radius: 30px; "> 
    			</div>
    			<div class="col-lg-7 px-5 pt-5">
                    <h3>Write a review</h3>
    				<form action="../Actions/add_review.php" method="post">
    					<div class="form-row">
    						<div class="col-lg-7">
    							<label for="exampleFormControlInput1" class="mt-3">Subject</label>
    							<input type="text" placeholder="Enter a subject" class="form-control p-4" required="required" name="review_subject">
    						</div>
    					</div>
    					<div class="form-row">
    						<div class="col-lg-7">
    							<label for="exampleFormControlTextarea1" class="mt-3">Review Statement</label>
    							<textarea class="form-control p-4" rows="3" name="product_review"></textarea>
    						</div> 
    					</div>
    					<input type="hidden" name="pid" value="<?= $_GET['pid'] ?>" style="font-family: cursive;">
     				 	<input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>" style="font-family: cursive;">
    					<div class="form-row">
    						<div class="col-lg-7">
    							<button type="submit" class="btn0 mt-3" name="submit">Submit Review</button>
    						</div> 
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </section>

    </div>
    
    
    <?php
        }
    ?>
</div>

<br>


    <!-- Footer -->
    <?php include("../footer.php");?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>