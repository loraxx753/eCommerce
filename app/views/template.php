<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$title;?></title>
	<?=Load::css(array("bootstrap.css", "style.css"))?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div id="logo" class="span5">
				<h1>NWA Furniture</h1>
			</div>
			<div id="admin_buttons" class="span5 offset2">
				<a href="<?=WEB_BASE?>admin" class="btn btn-small">Manage</a>
				<a href="<?=WEB_BASE?>client"class="btn btn-small">My Account</a>
				<a id="login" class="btn btn-small">Log-In</a>
			</div>
			<div id="search" class="span7">
				<form class="form-search pull-right" action="#">
					<div class="input-append">
						<input class="span6 search_field" type="text" /><button class="btn" type="button">Search</button>
					</div>
				</form>
			</div>
		</div>
		<nav id="nav" class="row">
			<ul>
				<li class="span3"><a href="<?=WEB_BASE?>">HOME</a></li>
				<li class="span3"><a href="<?=WEB_BASE?>catalog">PRODUCTS</a></li>
				<li class="span3"><a href="<?=WEB_BASE?>cart">CART</a></li>
				<li class="span3"><a href="<?=WEB_BASE?>checkout">CHECKOUT</a></li>
			</ul>
		</nav>
		<?php require_once($page_location); ?>
		<div class="row">
			<footer id="footer" class="span12">
				<div id="footer_links" class="span12"><a href="<?=WEB_BASE?>about">About Us</a> | <a href="<?=WEB_BASE?>about/policies">Policies</a></div>
				<span id="disclaimer" class="span12">
					This site is not official and is an assignment for a UCF Digital Media course.<br />
					Designed by NWA Furniture
				</span>
			</footer>
		</div>
	</div>
	<?=Load::js(array('http://code.jquery.com/jquery-1.8.2.js', 'http://code.jquery.com/ui/1.9.1/jquery-ui.js', 'bootstrap.js', 'ecommerce.js'));?>

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
</body>
</html>

<div id="loginBox">
	<span>Form Content</span>
</div>
