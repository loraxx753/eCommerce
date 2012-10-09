<!-- Starting the HTML -->
<!-- DISCLAIMER: I used Twitter Bootstrap for their grid system.  Bootstrap comes with basic styles built in, however, they have been changed in my stylesheet -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
			<div id="admin_buttons" class="span4 offset3">
				<form method="get" action="<?=WEB_BASE?>admin">
					<button class="btn btn-small">Manage</button>
				</form>
				<form method="get" action="<?=WEB_BASE?>client">
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
				<div class="span3"><?=Load::link(array("home" => "HOME"));?></div>
				<div class="span3"><?=Load::link(array("catalog" => "PRODUCTS"))?></a></div>
				<div class="span3"><?=Load::link(array("cart" => "CART"))?></div>
				<div class="span3"><?=Load::link(array("checkout" => "CHECKOUT"))?></div>
		</div>

		<?php require_once($page_location); ?>
		<div class="row">
			<div id="footer" class="span12">
				<span id="disclaimer" class="span12">
					This site is not official and is an assignment for a UCF Digital Media course.<br />
					Designed by Jesse Ferraro
				</span>
			</div>
		</div>
	</div>
	<?=Load::js(array('//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', "bootstrap.js"));?>
</body>
</html>