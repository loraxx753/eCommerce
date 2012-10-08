<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>NWA Furniture Admin - Jesse Ferraro</title>

	<style type="text/css">
		@import url("css/bootstrap.css");
		@import url("css/style.css");
	</style>

</head>
<body>
	<div class="container">
		<div class="row">
			<div id="logo" class="span5">
				<h1>NWA Furniture</h1>
			</div>
			<div id="admin_buttons" class="span4 offset3">
				<form method="get" action="admin.php">
					<button class="btn btn-small">Manage</button>
				</form>
				<form method="get" action="client.php">
					<button class="btn btn-small">My Account</button>
				</form>
				<button class="btn btn-small">Log-In</button>
			</div>
			<div id="search" class="span7">
				<form class="form-search pull-right" action="#">
					<div class="input-append">
						<input class="span6 search_field" type="text" /><button class="btn" type="button">Search</button>
					</div>
				</form>
			</div>
		</div>
		<div id="nav" class="row">
				<div class="span3"><a href="home.php">HOME</a></div>
				<div class="span3"><a href="catalog.php">PRODUCTS</a></div>
				<div class="span3"><a href="cart.php">CART</a></div>
				<div class="span3"><a href="checkout.php">CHECKOUT</a></div>
		</div>
		<div class="row">
			<div class="span4">
				<div class="row">
					<div id="admin_sidebar" class="span4">
						<h5>Admin Home</h5>
							<ul>
								<li><a href="#">Dashboard</a></li>
								<li><a href="#">Messages</a></li>
							</ul>
						<h5>Order Management</h5>
							<ul>
								<li><a href="#">Manage Orders</a></li>
								<li><a href="#">Manage Returns</a></li>
							</ul>
						<h5>Product Management</h5>
							<ul>
								<li><a href="#">Manage Products</a></li>
								<li><a href="#">Manage Inventory</a></li>
							</ul>
						<h5>Options</h5>
							<ul>
								<li><a href="#">Shipping Settings</a></li>
								<li><a href="#">Promotions</a></li>
								<li><a href="#">Cart Options</a></li>
								<li><a href="#">Payment Settings</a></li>
							</ul>
					</div>
				</div>
			</div>
			<div class="span8">
				<div class="row">
					<div id="admin_dashboard" class="span8">
							<h3>Administrator Dashboard</h3>
							<small>A summary of all recent activity on your account.</small>
						<div id="order_info" class="span8">
							<h5>Order Statistics</h5>
							<hr />
							<p class="span3">October Daily Average:</p>
							<p class="span3 pull-right">$100.00</p>
							<p class="span3">Today's Total:</p>
							<p class="span3 pull-right">$100.00</p>
							<p class="span3">Yesterday's Total:</p>
							<p class="span3 pull-right">$100.00</p>
							<p class="span3">October Total:</p>
							<p class="span3 pull-right">$100.00</p>
							<p class="span3">Estimated October Total:</p>
							<p class="span3 pull-right">$100.00</p>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div id="footer" class="span12">
				<span id="disclaimer" class="span12">
					This site is not official and is an assignment for a UCF Digital Media course.<br />
					Designed by Jesse Ferraro
				</span>
			</div>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script src="./js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>