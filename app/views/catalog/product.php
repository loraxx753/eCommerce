		<div class="row product">
			<div class="span6">
				<div class="thumbnail">
					<span><?=Load::image($product->Product_Image."_big.jpg", "Desk")?></span>
				</div>
			</div>
			<div class="span3">
				<h3><?=$product->Product_Name?></h3>
				<small>SKU# <?=$product->SKU?></small>
			</div>
			<div class="span2 offset1 rating">
				<ul>
					<?php 
					$counter = 0;
					for($x=0; $x < 5; $x++)
					{
						if($counter < $rating)
						{
							echo '<li><i class="icon-star"></i></li>';
							$counter++;
						}
						else
						{
							echo '<li><i class="icon-star-empty"></i></li>';
						}
					}
					?>
				</ul>
			</div>
			<div class="span6 product_description">
				<p><?=$product->Product_Description?></p>
			</div>
			<div class="span6 product_options pull-right">
				<div class="span2 pull-right"><h3>$<?=number_format($product->Product_Price, 2)?></h3></div>
			</div>
			<div class="span3 pull-right add_to_cart">
				<a href="<?=LINK_BASE?>catalog/cart/<?=$product->ProductID?>/1" class="btn btn-small">Add To Cart</a>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<div class="row">
					<div class="span12 featured">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">Policies</a></li>
								<li><a href="#tab2" data-toggle="tab">Reviews</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab1">
									<span>Return Policy</span>
									<p>We will accept merchandise returns of items at our stores within 90 days of customer receipt. Please understand, however, that bedding items may be returned or exchanged only if in their original packaging.</p>

									<p>Depending on the nature of the return/exchange and the presence of an original receipt or packing slip, we will issue an appropriate credit or refund in one of the following ways:</p>

									<ul>
										<li>If accompanied by the Original Sales Receipt or Packing Slip, the item’s purchase price will be refunded in the Original Form of Tender.</li>
										<li>If accompanied by an Original Gift Receipt, the item’s purchase price will be refunded via a Shop Card.</li>
										<li>If an Original Sales or Gift Receipt is not present, the item’s current retail price will be refunded via a Shop Card, regardless of amount. Valid photo ID is required for store returns without an Original Sales or Gift Receipt.</li>
										<li>For store returns of cash purchases accompanied by the Original Sales Receipt, a cash refund will be given up to $100. If the purchase exceeds $100, a check in the amount of the balance of the refund will be mailed to the customer.</li>
									</ul>
								</div>
								<div class="tab-pane" id="tab2">
									<span>Reviews</span>
									<form method="post" action="<?=LINK_BASE?>catalog/review/<?=$product->ProductID?>">
										<p>Add A Review</p>
										<p><textarea class="field span5 review_textarea" name="review"></textarea></p>
										<p>Rating: <input type="text" name="rating" class="rating_input"/> out of 5 <input type="submit" class="padding-left btn btn-small" id="reviewSubmit" value="Add Review" /></p>
									</form>
									<?php if($reviews) { 
										foreach ($reviews as $review) {
										?>
									<hr />
									<ul class="review_rating">
										<?php 
										$counter = 0;
										for($x=0; $x < 5; $x++)
										{
											if($counter < $review->rating)
											{
												echo '<li><i class="icon-star"></i></li>';
												$counter++;
											}
											else
											{
												echo '<li><i class="icon-star-empty"></i></li>';
											}
										}
										?>
									</ul>

									<p><?=$review->review?></p>
									<div class="review_user">
										<p><?=$review->user?> <?=date("n/j/Y h:ia",$review->created)?></p>
									</div>
									<?php }
										} else { ?>
										<p><em>There doesn't seem to be any reviews for this product</em></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>