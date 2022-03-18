<?php
//connect to the product view process file
require("../Actions/product_function.php");
include_once("../Controllers/product_controller.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View All Products</title>
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
<section class="collection" style="font-family: cursive;">         
<div class="container">
    <h1 class='text-center px-5'>Bags</h1>
    <center>
  <?php
  if((isset($_GET['type'])) && (isset($_GET['id']))){
          $bag_type = $_GET['type'];
          $id = $_GET['id'];
          if($bag_type == "cat"){
              $product = shopbycat_fxn($id);
              $item = view_categories_fxn();
              echo "<h5> ~ ".$item[$id]." ~ </h5";
          }elseif ($bag_type == "brand") {
              $product = shopbybrand_fxn($id);
              $item = view_brands_fxn();
              echo "<h5> ~ ".$item[$id]." ~ </h5";
          }elseif($bag_type == "gender"){
              $product = shopbygender_fxn($id);
              echo "<h5> ~ ".$id." ~ </h5";
          }
          
      }else{
        $product = display_products_fxn($start, $limit);
      }
    ?>
    </center>
    <div class="row px-3 py-2">      
        <?php
            
            //loop through products array
            foreach($product as $key => $products){
            
            ?>
    <div class="col-sm row-custom">
              <div class="card" style="width: 20rem;">
              <img src="<?php echo $products['product_image']; ?>" class="card-img-top" height="300" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $products['product_title']; ?></h5>
                <p class="card-text">Ghc <?php echo $products['product_price']; ?></p>
                <p class="card-text"><?php echo $products['product_desc']; ?></p>
                <center>
                <a href="single_product.php?pid=<?= $products['product_id']; ?>"><button class="btn0 mb-2">View Bags</button></a>
                <a href="<?php echo '../Actions/add_to_cart.php?pid='.$products['product_id'].'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><button class="btn0">Add to Cart</button></a>
                </center>
              </div>
              </div>
              <br>  
        </div>        
        <?php  }; ?>
        </div>
<?php
if($product == display_products_fxn($start, $limit)){ 
  ?>
<center>
<nav style="display: inline-block;">   
<?php
    if($pages>1){
        ?>
  <ul class="pagination">
    <?php
        for($i = 1; $i <= $pages; $i++){
        ?>
    <li class="page-item"><a class="page-link" style="color: #E9967A; float: right;" href="all_product.php?page=<?= $i; ?>"><?= $i; ?></a></li>
  
<?php }}}?>
</ul>
</nav>
</center>
</div> 
</section> 

<!-- Footer -->
<?php include("../footer.php");?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>

 