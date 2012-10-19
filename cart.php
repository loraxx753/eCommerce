<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>NWA Furniture Cart - Jesse Ferraro</title>

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
		<div class="page_header">
			<h2>Shopping Cart</h2>
			<hr />
		</div>
		<div class="row cart_item">
			<div class="span3">
				<div class="thumbnail">
					<img src="img/products/chair3_big.jpg" alt="Chair" />
				</div>
			</div>
			<div class="span9 item_details">
				<div class="span5">
					<p class="item_name">Wooden Chair</p>
					<small>SKU# 1234567890</small>
				</div>
				<div class="span3 pull-right price">
					<p class="item_total">$100.00</p>
				</div>
			</div>
			<div class="span3 pull-right additional_options">
				<div class="span2 pull-right">
					<p class="span1">Quantity:</p>
					<input type="text" class="span1" value="1" />
				</div>
				<div class="span2 pull-right action_buttons">
					<button class="btn btn-small span1">Update</button>
					<button class="btn btn-small">Delete</button>
				</div>
			</div>
		</div>
		<div class="row cart_item">
			<div class="span3">
				<div class="thumbnail">
					<img src="img/products/couch2_big.jpg" alt="Couch" />
				</div>
			</div>
			<div class="span9 item_details">
				<div class="span5">
					<p class="item_name">Chic Couch</p>
					<small>SKU# 0987654321</small>
				</div>
				<div class="span3 pull-right price">
					<p class="item_total">$100.00</p>
				</div>
			</div>
			<div class="span3 pull-right additional_options">
				<div class="span2 pull-right">
					<p class="span1">Quantity:</p>
					<input type="text" class="span1" value="1" />
				</div>
				<span class="span2 pull-right action_buttons">
					<button class="btn btn-small span1">Update</button>
					<button class="btn btn-small">Delete</button>
				</span>
			</div>
		</div>
		<div class="row cart_item">
			<div class="span3">
				<div class="thumbnail">
					<img src="img/products/chair2_big.jpg" alt="Chair" />
				</div>
			</div>
			<div class="span9 item_details">
				<div class="span5">
					<p class="item_name">Napoleon Chair</p>
					<small>SKU# 9874563210</small>
				</div>
				<div class="span3 pull-right price">
					<p class="item_total">$100.00</p>
				</div>
			</div>
			<div class="span3 pull-right additional_options">
				<div class="span2 pull-right">
					<p class="span1">Quantity:</p>
					<input type="text" class="span1" value="1" />
				</div>
				<div class="span2 pull-right action_buttons">
					<button class="btn btn-small span1">Update</button>
					<button class="btn btn-small">Delete</button>
				</div>
			</div>
		</div>
		<div class="row policies">
			<div class="span6 pull-right order_summary">
 				<div class="span2">
					<p class="sub_total">Sub-Total:</p>
				</div>
				<div id="sub-total" class="span3 pull-right">
					<p class="sub_total">$100.00</p>
				</div>
				<span class="span2 pull-right">
					<button class="btn btn-small">Proceed to Checkout</button>
				</span>
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