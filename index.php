<!DOCTYPE>
<?php
session_start();
	include("functions/functions.php");
	$sql = "SET GLOBAL sql_mode=\'\'";
?>
<html>
<head>
	<title>Wethinkwed</title>

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
						<form method="get" action="results.php"enctype="multipart/form-data">
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
			<!-- Side bar ends here -->
			<!-- Content area ends here -->
			<div id="content_area">
			<?php cart();?>
				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Greetings "Adventurer"! 
					<b style="color:gray">Shopping Cart - </b> 
					Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>
					<a href="cart.php" style="color:gray">Go to Cart</a>
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='customer_login.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					
					
					
					?>
					</span>
				</div>

				<div id="products_box">
					<?php getPro(); ?>
					<?php getCatPro(); ?>
					<?php getCat2Pro(); ?>
				</div>
			</div>
			<!-- Content area ends here -->
		</div>
		<div id="footer">
			<h3 style="text-align: center; padding-top: 30px">&copy; 2018 by WeThinkCode</h3>
		</div>
	</div>
	<!--Main Container ends here -->
</body>
</html>