<?php
require("../Controllers/product_controller.php");
if(!isset($_GET['sterm'])){
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Search Product</title>
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
    <div class="container" style="font-family: cursive;">
    <h4>Search Results For: <?php echo $_GET['sterm']?></h4>
    <br>
    <br>
    
    <?php
    $searchTerm = $_GET['sterm'];
    $results = search_product_fxn($searchTerm);
    if (!empty($results)){
    foreach($results as $key => $products){
    ?>

    <div class="media row-custom">
      <img src="<?php echo $products[1] ?>" class="align-self-start mr-3" alt="..." height="200px">
      <div class="media-body">
        <h5><?php echo $products[0]; ?></h5>
        <p>Price: GHc<?php echo $products[2]; ?></p>
        <a href="<?php echo '../Actions/add_to_cart.php?pid='.$key.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><button class="btn0">Add to Cart</button></a> 
      </div>
    </div>
    <br>
    <?php }}else{ echo "<h6>Sorry nothing was found. </h6>"; }?>
         
    </div>

    <!-- Footer -->
    <?php include("../footer.php");?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>