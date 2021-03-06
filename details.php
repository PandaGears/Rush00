<!DOCTYPE>
<?php
	include("functions/functions.php");
	$sql = "SET GLOBAL sql_mode=\'\'";
?>
<html>
<head>
	<title>WethinkWed</title>

	<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body>
	<!--Main Container starts here -->
	<div class="main_wrapper">
		<!--Header starts here -->
		<div class="header_wrapper">
			<img id="logo" src="img/logo.jpg"/>
			<img id="banner" src="img/banner.jpg"/>
		</div>
		<!--Header ends here -->

				<!--Menu bar starts here -->
				<div class="menubar">
					<ul id="menu">
					<li><a href="index.php">Home</a></li>
						<li><a href="all_products.php">All Products</a></li>
						<li><a href="customer/my_account.php">My Account</a></li>
						<li><a href="customer_registration.php">Sign Up</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="cart.php">Shopping Cart</a></li>
					</ul>
					<!-- Search bar starts here -->
					<div id="form">
						<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product"/>
						<input type="submit" name="search" value="Search" />
						</form>
					</div>
					<!-- Search bar ends here -->
				</div>
				<!--Menu bar ends here -->

		<div class="content_wrapper"> 
			<!-- Side bar starts here -->
			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					<?php getCats(); ?>
				</ul>
				<div id="sidebar_title">Genders</div>
				<ul id="cats">
					<?php getCats2(); ?>
				</ul>
				</div>
			</div>
			<!-- Side bar ends here -->
			<!-- Content area ends here -->
			<div id="content_area">
				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Greetings, "Adventurer" 
					<b style="color:gray">Shopping Cart - </b> 
					Total Items: <?php total_items(); ?> Total Price:<?php total_price(); ?>
					<a href="cart.php" style="color:gray">Go to Cart</a>
					
					</span>
				</div>
					<?php
						if(isset($_GET['pro_id'])) {
							$product_id = $_GET['pro_id'];
							$get_pro = "select * from products where product_id='$product_id'";
							$run_pro = mysqli_query($con, $get_pro);
							
							while ($row_pro = mysqli_fetch_array($run_pro)) {
								$pro_id = $row_pro['product_id'];
								$pro_title = $row_pro['product_title'];
								$pro_price = $row_pro['product_price'];
								$pro_image = $row_pro['product_image'];
								$pro_desc = $row_pro['product_desc'];
							
								echo "
									<div id='single_product'>
										<h3>$pro_title</h3>
										<img src='admin_area/product_images/$pro_image' width='400' height='400'/>
										<p><b>$pro_price Gp</b></p>
										<p>$pro_desc</p>
										<a href='index.php' style='float:left';>Go Back</a>
										<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
									</div>
								";
							}
						}
					?>

			</div>
			<!-- Content area ends here -->
		</div>
		<div id="footer" align="center">
			<h3 style="text-align: center; padding-top: 30px">&copy; 2018 by WeThinkCode</h3>
		</div>
	</div>
	<!--Main Container ends here -->
</body>
</html>