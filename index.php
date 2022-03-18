<?php
//connect to the cart controller
include_once (dirname(__FILE__)).'/Controllers/cart_controller.php';

//connect to the add product process file
include_once (dirname(__FILE__)).'/Actions/add_product.php';

$categories = array();
$categories = view_categories_fxn();

$brands = array();
$brands = view_brands_fxn(); 

function getIPAdd(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check if IP is from internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //check if IP is passed from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        //check if IP is from from remote address
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

//start session
session_start();
$ipadd = getIPAdd();
if(isset($_SESSION['user_id'])){
    $total = carttotal_fxn($_SESSION['user_id']);
}else{
    $total = carttotalNull_fxn($ipadd);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custom.css"> 
  </head>

  <body>
  	<!-- Navigation Bar for Index Page -->
  	<nav class="navbar navbar-expand-lg bh-white">
  		<a href="index.php" class="navbar-brand pl-5"><img src="Images/logo.png" height="60"></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<?php 
			//session_start();
			if (isset($_SESSION['user_id'])){
			    if($_SESSION['user_role'] == 1){
			    //if user is admin
			    ?>

  		<div class="collapse navbar-collapse" id="navbarNav" style="font-family: cursive;">
   			<ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="Admin/brand.php">Add Brand</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="Admin/category.php">Add Category</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="View/product.php">Add Bag</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="Admin/view_orders.php">Orders</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="View/all_product.php">Bags</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="View/cart.php"><i class="fa fa-shopping-cart"></i>Cart(<?php echo $total['count']; ?>)</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="Login/logout.php">Logout</a>
		      </li> 
		    </ul>
  		</div>


  		<?php
    		}else{
        	//if user is user  
    	?>

    	<div class="collapse navbar-collapse" id="navbarNav" style="font-family: cursive;">
   			<ul class="navbar-nav ml-auto">  
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="View/all_product.php">Bags</a>
		      </li> 
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="View/cart.php"><i class="fa fa-shopping-cart"></i>Cart(<?php echo $total['count']; ?>)</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link pr-5" href="Login/logout.php">Logout</a>
		      </li>
		    </ul>
  		</div>

  		<?php
    		}}else{
		?>

		<div class="collapse navbar-collapse" id="navbarNav" style="font-family: cursive;">
   			<ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="Login/login.php">Login</a>
		      </li> 
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="View/all_product.php">Bags</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="View/cart.php"><i class="fa fa-shopping-cart"></i>Cart(<?php echo $total['count']; ?>)</a>
		      </li>
		    </ul>
  		</div>

  		<?php
		}?>
		<div class='search_input' id='search_input_box' style="font-family: cursive;">
		    <div class='container'>
		        <form class='d-flex justify-content-between search-inner' method="get" action="View/product_search_result.php">
		            <input type='text' class='form-control' id='search_input' placeholder='Search Here' name='sterm'>
		            <button type='submit' name="search" class='btn0'>Search</button>
		        </form>
		    </div>
		</div>
	</nav>

	<!-- Brand Caegory Gender Selection -->
	<header>
		
		<div class="wrapper">
			<ul class="nav_links">
				<li><a href="View/all_product.php?type=gender&id=Male&Unisex">Male</a></li>
				<li><a href="View/all_product.php?type=gender&id=Female">Female</a></li>
				<li><a href="View/all_product.php?type=gender&id=Unisex">Unisex</a></li> 
				<li>
					<a href="">Categories</a>
					<ul class="drop-menu">
						<?php
					        foreach ($categories as $cat => $catname){
					           	echo "<li><a href='View/all_product.php?type=cat&id=".$cat."'>".$catname."</a></li>";  	
					        }
					    ?>		
					</ul>
				</li>
				<li>
					<a href="">Brands</a>
					<ul class="drop-menu">
						<?php
					      	foreach ($brands as $brand => $brandname){
					    		echo "<li><a href='View/all_product.php?type=brand&id=".$brand."'>".$brandname."</a></li>";
					      	}
					    ?> 		
					</ul>
				</li>
			</ul>
		</div>
	</header>


	<!-- Carousel -->
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="2000">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
	    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="Images/slide1.jpg" class="d-block w-100" alt="..." height="800">
	      <div class="carousel-caption d-none d-md-block">
	        <div class="container">
	        	<div class="row justify-content-start text-left">
	        		<div class="col-lg-8 mx-auto" style="font-family: cursive;">
	        			<h3>New Arrivals</h3>
	        			<a href="View/all_product.php"><button class="btn0 mt-3 ml-2">SHOP NOW</button></a>
	        		</div>
	        	</div>
	        </div>
	      </div>
	    </div>
	    <div class="carousel-item">
	      <img src="Images/slide2.jpg" class="d-block w-100" alt="..." height="800">
	      <div class="carousel-caption d-none d-md-block">
	        <div class="container">
	        	<div class="row justify-content-start text-left">
	        		<div class="col-lg-8 mx-auto" style="font-family: cursive;">
	        			<h3>New Arrivals</h3>
	        			<a href="View/all_product.php"><button class="btn0 mt-3 ml-2">SHOP NOW</button></a>
	        		</div>
	        	</div>
	        </div>
	      </div>
	    </div>
	    <div class="carousel-item">
	      <img src="Images/slide3.jpg" class="d-block w-100" alt="..." height="800">
	      <div class="carousel-caption d-none d-md-block">
	        <div class="container">
	        	<div class="row justify-content-start text-left">
	        		<div class="col-lg-8 mx-auto" style="font-family: cursive;">
	        			<h3>New Arrivals</h3>
	        			<a href="View/all_product.php"><button class="btn0 mt-3 ml-2">SHOP NOW</button></a>
	        		</div>
	        	</div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
</div>

<!-- About Us -->
<div class="whyschose" id="chooseus" style="font-family: cursive;">
	<br>
	<br>
    <div class="container">
		<div class="row">
            <div class="col-md-7 offset-md-3">
               <div class="title">
                    <h2>Why <strong class="black">choose us...</strong></h2>
                    <span>Buy Bag-it bags?</span>
                    <br>
                    <span>Yes! You wont regret it... It's a promise!</span>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="choose_bg" style="font-family: cursive;">
    <div class="container">
        <div class="white_bg">
            <div class="row">
               <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="for_box">
                     <i><img src="Images/brand.png" height="100" /></i>
                     <h3>Various Brands</h3>
                     <p>Bagit is stocked with a rich collection of brands worldwide</p>
                  </div>
               </dir>
               <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="for_box">
                     <i><img src="Images/delivery.png" height="100"/></i>
                     <h3>Quick Delivery</h3>
                     <p>Available bags are quickly delivered within Ghana</p>
                  </div>
               </dir>
               <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="for_box">
                     <i><img src="Images/money.png" height="100"/></i>
                     <h3>Affordable Pricing</h3>
                     <p>Bagit prices are not out of your pocket </p>
                  </div>
               </dir>
               <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="for_box">
                     <i><img src="Images/category.png" height="100"/></i>
                     <h3>Versatile Categories</h3>
                     <p>Bagit has bags for every ocassion, and can be worn with anything</p>
                  </div>
               </dir>
            </div>
         </div>
    </div>
</div>

	<br>
	<br>
	<br>
	<br>
<!-- Featured Products -->
<section class="featured-product-section container-fluid py-5">
	<div class="container p-0">
		<div class="title-section text-center mb-2">
			<h2 class="title" style="font-family: cursive;"> Featured <span>Bags</span></h2>
		</div>

		<!-- Product Row -->
		<div class="row justify-content-center" style="font-family: cursive;">
			<div class="col-lg-4 col-md-4 col-sm-6 col-10 mx-auto mb-3 product-box">
				<div class="product-img-box col-10 p-0 mx-auto overflow-hidden">
					<img src="Images/pinkcutie.jpeg" height="350"> 
				</div>
				<div class="col-10 text-center mt-4 mx-auto product-title">
					<a href="View/single_product.php?pid=15">View Bag</a>
					<h4>GhC 20</h4>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-10 mx-auto mb-3 product-box">
				<div class="product-img-box col-10 p-0 mx-auto overflow-hidden">
					<img src="Images/multicolored.jpeg" height="350"> 
				</div>
				<div class="col-10 text-center mt-4 mx-auto product-title">
					<a href="View/single_product.php?pid=3">View Bag</a>
					<h4>GhC 21</h4>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-10 mx-auto mb-3 product-box">
				<div class="product-img-box col-10 p-0 mx-auto overflow-hidden">
					<img src="Images/famous.jpeg" height="350"> 
				</div>
				<div class="col-10 text-center mt-4 mx-auto product-title">
					<a href="View/single_product.php?pid=17">View Bag</a>
					<h4>GhC 15</h5>
				</div>
			</div>

		</div>
	</div>
</section>


	<!-- Category -->
	<section class="section category" style="font-family: cursive;">
		<div class="title-section text-center mb-1">
			<h2 class="title" style="font-family: cursive;"> Get Cozy with <span>Bag-it</span></h2>
		</div>
	    <div class="category__center container">
	        <div class="category__left">
	            <div class="content">
	                <h4>Gucci</h4>
	                <h6>Best Offers</h6>
	                <a href="View/all_product.php?type=brand&id=2"><button class="btn0">SHOP NOW</button></a> 
	            </div>
	            <img src="Images/redbag.png" height="180" alt="">
	        </div>

	        <div class="category__right">
	            <div class="content">
	                <h4>Coach</h4>
	                <h6>Best Prices</h6>
	                <a href="View/all_product.php?type=brand&id=1"><button class="btn0">SHOP NOW</button></a>
	            </div>
	            <img src="Images/schoolblue.png" height="200" alt="">
	        </div>
	    </div>
	</section> 
	<br>
	<section class="section category" style="font-family: cursive;"> 
	    <div class="category__center container">
	        <div class="category__left">
	            <div class="content">
	                <h4>Shoulder Bags</h4>
	                <h6>Original Brands</h6>
	                <a href="View/all_product.php?type=cat&id=11"><button class="btn0">SHOP NOW</button></a> 
	            </div>
	            <img src="Images/sbags.png" height="220" alt="">
	        </div>

	        <div class="category__right">
	            <div class="content">
	                <h4>Wallets</h4>
	                <h6>Save 50%</h6>
	                <a href="View/all_product.php?type=cat&id=5"><button class="btn0">SHOP NOW</button></a>
	            </div>
	            <img src="Images/wallet.png" height="200" alt="">
	        </div>
	    </div>
	</section>
	<br>


<!-- Footer -->
	<footer>
		<div class="up-section">

		<!-- Logo -->
		<a href="index.php" class="navbar-brand pl-5"><img src="Images/logo.png" height="100"></a>

		<ul>
			<h1>About Us</h1>
			<li><a href="index.php">Home</a></li>
			<li><a href="View/all_product.php">Products</a></li> 
			<li><a href="#chooseus">About</a></li>
		</ul>

		<ul>
			<h1>Contact Us</h1>
			<li><p>(+2332)207120551</p></li>
			<li><p>bagit@gmail.com</p></li>
			<li><p>Mawuena Loop, Building 21</p></li>
			<li><p>Tema</p></li>
			<li><p>Ghana</p></li>
		</ul>

		<div class="social">
			<h1>Follow Us</h1>
			<div class="social-icons">
				<a href="https://twitter.com/bern_iie" target="blank"><i class="fa fa-twitter"></i></a>
				<a href="https://instagram.com/mbhaligah" target="blank"><i class="fa fa-instagram"></i></a>
			</div>
		</div>

		</div>
	</footer>
 
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>