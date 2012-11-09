		<div class="row">
			<div class="span8">
				<div class="row">
					<div class="span4 offset4 form_row">
						<div class="span4">
							<div class="row">
									<h3>Order Summary</h3>
									<?php if(count($cartArray) > 0) { ?>
									<div>
										<p class="span2">Merchandise:</p>
										<p class="span2">$<?=number_format($total, 2);?></p>
									</div>
									<div>
										<p class="span2">Shipping &amp; Handling:</p>
										<p class="span2">$<?=number_format($shipping, 2);?></p>
									</div>
									<div>
										<p class="span2">Tax:</p>
										<p class="span2">$<?=number_format($tax, 2);?></p>
									</div>
									<div id="order_total">
										<h4 class="span2">Total:</h4>
										<h4 class="span2">$<?=number_format($total + $shipping + $tax, 2);?></h4>
									</div>
									
									<form method="POST"
				  action="https://sandbox.google.com/checkout/api/checkout/v2/checkoutForm/Merchant/474976065546649"
				      accept-charset="utf-8">

				      <?php
				      	foreach ($cartArray as $key => $products) 
				      	{
				      		foreach ($products as $key2 => $value) 
				      		{
					      		echo"
					      			<input type='hidden' name='item_name_".$key."' value='".$value->Product_Name."'/>
					  				<input type='hidden' name='item_description_".$key."' value='".$value->Product_Description."'/>
					 	 			<input type='hidden' name='item_quantity_".$key."' value='".$cart[$key]."'/>
					  				<input type='hidden' name='item_price_".$key."' value='".$value->Product_Price."'/>
					  				<input type='hidden' name='item_currency_".$key."' value='USD'/>
					      		";
				      		}
				      	}

				      	echo"
				      		  <input type='hidden' name='ship_method_name_1' value='UPS Ground'/>
							  <input type='hidden' name='ship_method_price_1' value='".$shipping."'/>
							  <input type='hidden' name='ship_method_currency_1' value='USD'/>

							  <input type='hidden' name='tax_rate' value='".$tax."'/>
							  <input type='hidden' name='tax_us_state' value='NY'/>

							  <input type='hidden' name='_charset_'/>
				      	";
				      ?>

								  <input type="image" name="Google Checkout" alt="Fast checkout through Google"
								src="https://sandbox.google.com/checkout/buttons/checkout.gif?merchant_id=474976065546649&w=180&h=46&style=white&variant=text&loc=en_US"
								height="46" width="180"/>

								</form>
								<?php } else { ?>
								<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button><strong>Missing Something?</strong> <p>You have no items in your cart!</p></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
