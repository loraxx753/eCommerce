<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>NWA Furniture Catalog - Jesse Ferraro</title>

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
			<div class="span3">
				<div class="row">
					<div id="sidebar" class="span3">
						<h4>Item Categories</h4>
							<ul>
								<li><a href="#">Chairs</a></li>
								<li><a href="#">Couches</a></li>
								<li><a href="#">Desks</a></li>
							</ul>
						<h4>Narrow Results</h4>
						<h5>Price</h5>
							<ul>
								<li><a href="#">$0-$100</a></li>
								<li><a href="#">$100-$200</a></li>
								<li><a href="#">$200-$300</a></li>
								<li><a href="#">$300-$400</a></li>
								<li><a href="#">$400+</a></li>
							</ul>
						<h5>Material</h5>
							<ul>
								<li><a href="#">Cotton</a></li>
								<li><a href="#">Leather</a></li>
								<li><a href="#">Wool</a></li>
								<li><a href="#">Polyester</a></li>
							</ul>
						<h5>Weight</h5>
							<ul>
								<li><a href="#">0<small>lbs</small>-50<small>lbs</small></a></li>
								<li><a href="#">50<small>lbs</small>-100<small>lbs</small></a></li>
								<li><a href="#">100<small>lbs</small>-150<small>lbs</small></a></li>
								<li><a href="#">150<small>lbs</small>-200<small>lbs</small></a></li>
							</ul>
					</div>
				</div>
			</div>
			<div class="span8">
				<div class="row">
					<div class="span9">
						<h2 class="catalog_header">Item Categories</h2>
						<hr />
						<div class="span2 item">
							<div class="thumbnail">
								<img src="img/products/chair2_thumbnail.jpg" alt="Chairs" />
								<p><a href="#">Chairs</a></p>
							</div>
						</div>
						<div class="span2 offset1 item">
							<div class="thumbnail">
								<img src="img/products/couch1_thumbnail.jpg" alt="Couches" />
								<p><a href="#">Couches</a></p>
							</div>
						</div>
						<div class="span2 offset1 item">
							<div class="thumbnail">
								<img src="img/products/desk_thumbnail.jpg" alt="Desks" />
								<p><a href="#">Desks</a></p>
							</div>
						</div>		
					</div>
					<div class="span9">
						<h2 class="catalog_header">Merchandise</h2>
						<hr />
						<div class="span2">
							<div class="thumbnail">
								<img src="img/products/couch2_thumbnail.jpg" alt="Chic Couch" />
								<h5><a href="product.php">Chic Couch</a></h5>
								<h5>$100.00</h5>
							</div>
						</div>
						<div class="span2 offset1">
							<div class="thumbnail">
								<img src="img/products/couch3_thumbnail.jpg" alt="Viewing Couch" />
								<h5><a href="product.php">Viewing Couch</a></h5>
								<h5>$100.00</h5>
							</div>
						</div>
						<div class="span2 offset1">
							<div class="thumbnail">
								<img src="img/products/couch4_thumbnail.jpg" alt="Resting Couch" />
								<h5><a href="product.php">Resting Couch</a></h5>
								<h5>$100.00</h5>
							</div>
						</div>	
						<div class="span2 featured">
							<div class="thumbnail">
								<img src="img/products/desk_thumbnail.jpg" alt="Apple Desk" />
								<h5><a href="product.php">Apple Desk</a></h5>
								<h5>$100.00</h5>
							</div>
						</div>
						<div class="span2 offset1 featured">
							<div class="thumbnail">
								<img src="img/products/desk2_thumbnail.jpg" alt="Writing Desk" />
								<h5><a href="product.php">Writing Desk</a></h5>
								<h5>$100.00</h5>
							</div>
						</div>
						<div class="span2 offset1 featured">
							<div class="thumbnail">
								<img src="img/products/desk3_thumbnail.jpg" alt="Computer Desk" />
								<h5><a href="product.php">Computer Desk</a></h5>
								<h5>$100.00</h5>
							</div>
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