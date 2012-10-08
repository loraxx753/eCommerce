<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>NWA Furniture Checkout - Jesse Ferraro</title>

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
			<div class="span8">
				<div class="row">
					<div class="span8 form_row">
						<h3>Enter Shipping Information</h3>
						<form id="shipping_info" action="#">
							<div>
								<label><i>*</i> First Name:</label>
								<input name="first_name" class="first_name" type="text" />
							</div>
							<div>
								<label><i>*</i> Last Name:</label>
								<input name="last_name" class="last_name" type="text" />
							</div>
							<div>
								<label>Company:</label>
								<input name="company" class="company" type="text" />
							</div>
							<div>
								<label><i>*</i> Address 1:</label>
								<input name="address1" class="address1" type="text" />
							</div>
							<div>
								<label>Address 2:</label>
								<input name="address2" class="address2" type="text" />
							</div>
							<div>
								<label><i>*</i> City:</label>
								<input name="city" class="city" type="text" />
							</div>
							<div>
								<label><i>*</i> State:</label>
								<select name="state" class="state">
									<option>&nbsp;</option> 
									<option>Florida</option>
									<option>New York</option>
									<option>California</option>
									<option>Georgia</option>
								</select>
							</div>
							<div>
								<label><i>*</i> ZIP Code:</label>
								<input name="zipcode" class="zipcode" type="text" />
							</div>
							<div>
								<label><i>*</i> Phone Number:</label>
								<input name="phone_number" class="phone_number" type="text" />
							</div>
						</form>
					</div>
					<div class="span8">
						<h3>Enter Billing Information</h3>
						<div class="row">
							<div class="span8 form_row">
								<form id="billing_info" action="#">
									<div>
										<label><i>*</i> First Name:</label>
										<input name="first_name" class="first_name" type="text" />
									</div>
									<div>
										<label><i>*</i> Last Name:</label>
										<input name="last_name" class="last_name" type="text" />
									</div>
									<div>
										<label>Company:</label>
										<input name="company" class="company" type="text" />
									</div>
									<div>
										<label><i>*</i> Address 1:</label>
										<input name="address1" class="address1" type="text" />
									</div>
									<div>
										<label>Address 2:</label>
										<input name="address2" class="address2" type="text" />
									</div>
									<div>
										<label><i>*</i> City:</label>
										<input name="city" class="city" type="text" />
									</div>
									<div>
										<label><i>*</i> State:</label>
										<select name="state" class="state">
											<option>&nbsp;</option> 
											<option>Florida</option>
											<option>New York</option>
											<option>California</option>
											<option>Georgia</option>
										</select>
									</div>
									<div>
										<label><i>*</i> ZIP Code:</label>
										<input name="zipcode" class="zipcode" type="text" />
									</div>
									<div>
										<label><i>*</i> Phone Number:</label>
										<input name="phone_number" class="phone_number" type="text" />
									</div>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="span8 last_form_row">
								<h3>Credit Card Information:</h3>
								<form id="card_info" action="#">
									<div>
										<label><i>*</i> Name on Card:</label>
										<input name="card_name" class="card_name" type="text" />
									</div>
									<div>
										<label><i>*</i> Card Type:</label>
										<select name="card_type" class="card_type">
											<option>&nbsp;</option> 
											<option>Visa</option>
											<option>MasterCard</option>
											<option>American Express</option>
											<option>Discovery</option>
										</select>
									</div>
									<div>
										<label><i>*</i> Card Number:</label>
										<input name="card_number" class="card_number" type="text" />
									</div>
									<div>
										<label><i>*</i> Expiration:</label>
										<select name="expir_month" class="span2 expir_month">
											<option>Month</option> 
											<option>January</option>
											<option>February</option>
											<option>March</option>
											<option>April</option>
											<option>May</option>
											<option>June</option>
											<option>July</option>
											<option>August</option>
											<option>September</option>
											<option>October</option>
											<option>November</option>
											<option>December</option>
										</select>
										<select name="expir_year" class="span2 expir_year">
											<option>Year</option> 
											<option>2015</option>
											<option>2014</option>
											<option>2013</option>
											<option>2012</option>
										</select>
									</div>
									<div>
										<label><i>*</i> CVV2 Code:</label>
										<input name="cvv2_code" class="cvv2_code" type="text" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="row">
					<div id="checkout_sidebar" class="span4">
						<h3>Order Summary</h3>
						<div>
							<p class="span2">Merchandise:</p>
							<p class="span2">$100.00</p>
						</div>
						<div>
							<p class="span2">Shipping &amp; Handling:</p>
							<p class="span2">$100.00</p>
						</div>
						<div>
							<p class="span2">Tax:</p>
							<p class="span2">$100.00</p>
						</div>
						<div id="order_total">
							<h4 class="span2">Total:</h4>
							<h4 class="span2">$300.00</h4>
						</div>
					<button type="submit" id="checkout" class="btn span4">Checkout</button>
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