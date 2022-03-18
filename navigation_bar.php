<?php
	//connect to the cart controller
	include_once (dirname(__FILE__)).'/Controllers/cart_controller.php';

	//connect to the add product process file
	include_once (dirname(__FILE__)).'/Actions/add_product.php';

	$categories = array();
	$categories = view_categories_fxn();

	$brands = array();
	$brands = view_brands_fxn();

    //check if button is clicked
    if (isset($_GET['search'])){
        $term = $_GET['sterm'];
        if(!empty($term)){
            header("location: ../View/product_search_result.php?sterm=$term");
        }
    }

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


    ?>

  	<nav class="navbar navbar-expand-lg bh-white" style="font-family: cursive;">
  		<a href="../index.php" class="navbar-brand pl-5"><img src="../Images/logo.png" height="60"></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<?php 
			session_start();
			$ipadd = getIPAdd();
			if(isset($_SESSION['user_id'])){
			    $total = carttotal_fxn($_SESSION['user_id']);
			}else{
			    $total = carttotalNull_fxn($ipadd);
			}

			if (isset($_SESSION['user_id'])){
			    if($_SESSION['user_role'] == 1){
			    //if user is admin
			    ?>

  		<div class="collapse navbar-collapse" id="navbarNav">
   			<ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="../Admin/brand.php">Add Brand</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="../Admin/category.php">Add Category</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="../View/product.php">Add Bag</a>
		      </li> 
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="../Admin/view_orders.php">Orders</a>
		      </li> 
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="../View/all_product.php">Bags</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="../View/cart.php"><i class="fa fa-shopping-cart"></i>Cart(<?php echo $total['count']; ?>)</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-4" href="../Login/logout.php">Logout</a>
		      </li> 
		    </ul>
  		</div>


  		<?php
    		}else{
        	//if user is user  
    	?>

    	<div class="collapse navbar-collapse" id="navbarNav">
   			<ul class="navbar-nav ml-auto">  
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="../View/all_product.php">Bags</a>
		      </li> 
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="../View/cart.php"><i class="fa fa-shopping-cart"></i>Cart(<?php echo $total['count']; ?>)</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link pr-5" href="../Login/logout.php">Logout</a>
		      </li>
		    </ul>
  		</div>

  		<?php
    		}}else{
		?>

		<div class="collapse navbar-collapse" id="navbarNav">
   			<ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="../Login/login.php">Login</a>
		      </li> 
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="../View/all_product.php">Bags</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link pr-5" href="../View/cart.php"><i class="fa fa-shopping-cart"></i>Cart(<?php echo $total['count']; ?>)</a>
		      </li> 
		    </ul>
  		</div>

  		<?php
		}?>
		<div class='search_input' id='search_input_box'>
		    <div class='container'>
		        <form class='d-flex justify-content-between search-inner' method="get" action="product_search_result.php">
		            <input type='text' class='form-control' id='search_input' placeholder='Search Here' name='sterm'>
		            <button type='submit' name="search" class='btn0'>Search</button>
		        </form>
		    </div>
		</div>
	</nav>
	
	<!-- Brand Category Gender Selection -->
	<header>
		<div class="wrapper">
			<ul class="nav_links">
				<li><a href="all_product.php?type=gender&id=Male">Male</a></li>
				<li><a href="all_product.php?type=gender&id=Female">Female</a></li>
				<li><a href="all_product.php?type=gender&id=Unisex">Unisex</a></li> 
				<li>
					<a href="">Categories</a>
					<ul class="drop-menu">
						<?php
					        foreach ($categories as $cat => $catname){
					           	echo "<li><a href='all_product.php?type=cat&id=".$cat."'>".$catname."</a></li>";
					        }
					    ?>		
					</ul>
				</li>
				<li>
					<a href="">Brands</a>
					<ul class="drop-menu">
						<?php
					      	foreach ($brands as $brand => $brandname){
					    		echo "<li><a href='all_product.php?type=brand&id=".$brand."'>".$brandname."</a></li>";
					      	}
					    ?> 		
					</ul>
				</li>
			</ul>
		</div>
	</header>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>