		<div class="page_header">
			<h2>Shopping Cart</h2>
			<hr />
		</div>

		<div id="jcart">
			<?php $jcart->display_cart();?>
		</div>

		<?php 
			if(count($cartArray) > 0)
			{
				foreach ($cartArray as $key => $products) 
				{
					$quantity = $cart[$key];
					foreach ($products as $key => $product) 
					{
						echo'<div class="row cart_item">
							<div class="span3">
								<div class="thumbnail">'.
									Load::image($product->Product_Image."_big.jpg", "Chair").
								'</div>
							</div>
							<div class="span9 item_details">
								<div class="span5">
									<p class="item_name">'.$product->Product_Name.'</p>
									<small>SKU# '.$product->SKU.'</small>
								</div>
								<div class="span3 pull-right price">
									<p class="item_total">$'.number_format($product->Product_Price, 2).'</p>
								</div>
							</div>
							<div class="span3 pull-right additional_options">
								<div class="span2 pull-right">
									<p class="span1">Quantity:</p>
									<input type="text" class="span1 quantity" value="'.$quantity.'" />
								</div>
								<div class="span2 pull-right action_buttons">
								 	<span><a href="'.LINK_BASE.'cart/update/'.$product->ProductID.'/"class="btn btn-small span1 update_product">Update</a></span>
									<span><a href="'.LINK_BASE.'cart/delete/'.$product->ProductID.'" class="btn btn-small span1 delete_product">Delete</a></span>
								</div>
							</div>
						</div>';
					}
				}
			}
		?>