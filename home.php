<!-- Starting the HTML -->
<!-- DISCLAIMER: I used Twitter Bootstrap for their grid system.  Bootstrap comes with basic styles built in, however, they have been changed in my stylesheet -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>NWA Furniture - Jesse Ferraro</title>

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
			<div id="featured_slider" class="span12">
				<img src="img/slider.jpg" alt="Furniture Sale!" />
			</div>
		</div>
		<div id="main_content" class="row">
			<div class="span8">
				<div class="row">
					<div class="span9 featured">
						<div class="span2">
							<ul class="thumbnail">
								<li><img src="img/products/chair2_thumbnail.jpg" alt="Wooden Chair" /></li>
								<li><a href="product.php">Napoleon Chair</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset1">
							<ul class="thumbnail">
								<li><img src="img/products/chair3_thumbnail.jpg" alt="Wooden Chair" /></li>
								<li><a href="product.php">Wooden Chair</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset1">
							<ul class="thumbnail">
								<li><img src="img/products/couch1_thumbnail.jpg" alt="Thinking Couch" /></li>
								<li><a href="product.php">Thinking Couch</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset6">
							<button class="btn btn-small featured_button">More Featured Items</button>
						</div>						
					</div>
					<div class="span9 featured">
						<div class="span2">
							<ul class="thumbnail">
								<li><img src="img/products/couch2_thumbnail.jpg" alt="Chic Couch" /></li>
								<li><a href="product.php">Chic Couch</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset1">
							<ul class="thumbnail">
								<li><img src="img/products/couch3_thumbnail.jpg" alt="Viewing Couch" /></li>
								<li><a href="product.php">Viewing Couch</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset1">
							<ul class="thumbnail">
								<li><img src="img/products/couch4_thumbnail.jpg" alt="Resting Couch" /></li>
								<li><a href="product.php">Resting Couch</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset6">
							<button class="btn btn-small featured_button">More Top Sellers</button>
						</div>	
					</div>
					<div class="span9 featured">
						<div class="span2">
							<ul class="thumbnail">
								<li><img src="img/products/desk_thumbnail.jpg" alt="Apple Desk" /></li>
								<li><a href="product.php">Apple Desk</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset1">
							<ul class="thumbnail">
								<li><img src="img/products/desk2_thumbnail.jpg" alt="Writing Desk" /></li>
								<li><a href="product.php">Writing Desk</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset1">
							<ul class="thumbnail">
								<li><img src="img/products/desk3_thumbnail.jpg" alt="Computer Desk" /></li>
								<li><a href="product.php">Computer Desk</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 offset6">
							<button class="btn btn-small featured_button">More Newly Added</button>
						</div>	
					</div>
				</div>
			</div>
			<div class="span3 offset1">
				<div class="row">
					<div id="ad_sidebar" class="span3">
						<img src="img/ads/ad1.jpg" alt="Marketing Firm Ad" />
						<img src="img/ads/ad2.jpeg" alt="McDonalds Ad"/>
						<img src="img/ads/ad3.jpg" alt="Apple Ad" />
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