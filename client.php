<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>NWA Furniture Client - Jesse Ferraro</title>

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
					<div id="client_sidebar" class="span4">
						<h5>Account Home</h5>
							<ul>
								<li><a href="#">Dashboard</a></li>
								<li><a href="#">Messages</a></li>
							</ul>
						<h5>Orders</h5>
							<ul>
								<li><a href="#">Order History</a></li>
								<li><a href="#">Returns</a></li>
							</ul>
						<h5>Options</h5>
							<ul>
								<li><a href="#">Account Settings</a></li>
								<li><a href="#">Address Book</a></li>
								<li><a href="#">Payment Types</a></li>
								<li><a href="#">Subscriptions</a></li>
								<li><a href="#">Academic Info</a></li>
							</ul>
						<h5>Shopping</h5>
							<ul>
								<li><a href="#">Shopping Cart</a></li>
								<li><a href="#">Wish Lists</a></li>
								<li><a href="#">Products Purchased</a></li>
								<li><a href="#">Auto Notifications</a></li>
								<li><a href="#">Price Alerts</a></li>
								<li><a href="#">Rebate Center</a></li>
								<li><a href="#">Gift Cards</a></li>
							</ul>
					</div>
				</div>
			</div>
			<div class="span8">
				<div class="row">
					<div id="dashboard" class="span8">
							<h3>Dashboard</h3>
							<small>A summary of all recent activity on your account.</small>
						<div id="account_info" class="span8">
							<h5>Account Info</h5>
							<hr />
							<p class="span2">Account ID:</p>
							<p class="span4">j.ferraro@hotmail.com</p>
							<p class="span2">Account #:</p>
							<p class="span4">12345678</p>
							<p class="span2">Address:</p>
							<p class="span4">4000 Central Florida Blvd, Orlando FL 32816</p>
						</div>	
						<div class="span8">
							<h5>Recent Order Status</h5>
							<hr />
							<p class="span2">Invoice #:</p>
							<p class="span4"><a href="#">12345678</a></p>
							<p class="span2">Status:</p>
							<p class="span4">Shipped</p>
						</div>	
						<div class="span8">
							<h5>Recent RMA Status</h5>
							<hr />
							<p class="span3">None Currently Available</p>
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