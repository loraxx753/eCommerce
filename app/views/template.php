<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="For furniture, home decor, gifts, housewares, registry items and more, visit NWA Furniture today and look no further for style." />
	<meta name="keywords" content="Sale, Catalog, Decorating, Interior Design, Entertain, Design, Bed Room, Dining Room, Home Office, Living Room, Office, Outdoor, Home, Home Accessories, Housewares, Furniture, Sofa, Couch, Chair" />
	<title><?=$title;?></title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	<?=Load::css(array("bootstrap.css", "style.css"))?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div id="logo" class="span5">
				<h1>NWA Furniture</h1>
			</div>
			<div id="admin_buttons" class="span6 offset1">
 				<?php if(!Session::get('username')) {?>
				<span><a id="login" class="btn btn-small">Log-In/Register</a></span>
				<?php } else { ?>
				<span><a id="logout" href="<?=LINK_BASE?>user/logout" class="btn btn-small">Logout</a></span>
				<span><a id="account" href="<?=LINK_BASE?>client" class="btn btn-small">My Account</a></span>
				<?php if(Auth::check_access('admin')) {?>
					<span><a href="<?=LINK_BASE?>client/manage" class="btn btn-small">Manage</a></span>
				<?php } ?>
				<span id="welcome">Welcome, <?=Session::get('username')?></span>
				<?php } ?>				
			</div>
			<div id="search" class="span7">
				<form class="form-search pull-right" action="<?=LINK_BASE?>catalog/search/">
					<div class="input-append">
						<input class="span6 search_field" type="text" /><a href="<?=LINK_BASE?>catalog/search/" class="btn">Search</a>
					</div>
				</form>
			</div>
		</div>
		<nav id="nav" class="row">
			<ul>
				<li class="span3"><a href="<?=HOME_LINK_BASE?>">HOME</a></li>
				<li class="span3"><a href="<?=LINK_BASE?>catalog">PRODUCTS</a></li>
				<li class="span3"><a href="<?=LINK_BASE?>cart">CART</a></li>
				<li class="span3"><a href="<?=LINK_BASE?>checkout">CHECKOUT</a></li>
			</ul>
		</nav>
		<?php require_once($page_location); ?>
		<div class="row">
			<footer id="footer" class="span12">
				<div id="footer_links" class="span12"><a href="<?=LINK_BASE?>about">About Us</a> | <a href="<?=LINK_BASE?>about/policies">Policies</a></div>
				<span id="disclaimer" class="span12">
					This site is not official and is an assignment for a UCF Digital Media course.<br />
					Designed by NWA Furniture
				</span>
			</footer>
		</div>
	</div>
	<script type="text/javascript">
		// To dynamically get the web_base, link_base, and home_link_base from php and assign it to js
		var WEB_BASE = <?='"'.WEB_BASE.'"'?>;
		var LINK_BASE = <?='"'.LINK_BASE.'"'?>;
		var HOME_LINK_BASE = <?='"'.HOME_LINK_BASE.'"'?>;
	</script>
	<?=Load::js(array('http://code.jquery.com/jquery-1.8.2.js', 'http://code.jquery.com/ui/1.9.1/jquery-ui.js', 'bootstrap.js', 'ecommerce.js', 'product.js'));?>

<!-- Google Analytics -->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-15417266-13']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

	<div id="loginBox">
		<form id="loginArea" method="post" action="<?=LINK_BASE?>user/login">
			<label>Username:</label>
			<input type="text" name="user">
			<label>Password:</label>
			<input type="password" name="password">
			<p><a id="regLink" href="#">Register an Account</a></p>
		</form>
	</div>
	<div id="regBox">
		<form id="regArea" method="post" action="<?=LINK_BASE?>user/register">
			<label>Username:</label>
			<input name="name" type="text">
			<label>Password:</label>
			<input name="pass_alpha" type="password">
			<label>Re-type Password:</label>
			<input name="pass_beta" type="password">
			<label>Email:</label>
			<input name="email" type="text">
		</form>
	</div>
	<div id="editBox">
		<form id="editArea" method="post" action="<?=LINK_BASE?>catalog/edit_product">
		<fieldset>
			<div class="span3">
	       		<label>Product ID:</label>
	       		<input type="text" name="ProductID" placeholder="Enter product id here" />
	       	</div>
	       	<div class="span3">
	       		<label>Product Name:</label>
	       		<input type="text" name="Product_Name" placeholder="Enter product name here" />
	       	</div>
	    	<div class="span">
	        	<label>SKU:</label>
	       		<input type="text" name="SKU" class="span3" placeholder="Enter SKU here" />
	        </div>
	        <div class="span6">
	        	<label>Product Description:</label>
	       		<input type="text" name="Product_Description" placeholder="Enter Description here" />
	        </div>
	        <div class="span3">
	       		<label>Stock:</label>
	       		<input type="text" name="Stock" placeholder="Enter stock amount here" />
	       	</div>
	       	<div class="span3">
	       		<label>Cost:</label>
	       		<input type="text" name="Product_Cost" placeholder="Enter product cost here" />
	       	</div>
	       	<div class="span3">
	       		<label>Product Price:</label>
	       		<input type="text" name="Product_Price" placeholder="Enter product price here" />
	       	</div>
	       	<div class="span3">
	       		<label>Product Weight:</label>
	       		<input type="text" name="Weight" placeholder="Enter product weight here" />
	       	</div>
	       	<div class="span3">
	       		<label>Product Size:</label>
	       		<input type="text" name="Size" placeholder="Enter product size here" />
	       	</div>
	       	<div class="span3">
	       		<label>Featured Product:</label>
	       		<input type="checkbox" name="feat" value="true">
	       	</div>                           	
	    </fieldset>
		</form>	
	</div>
</body>
</html>
