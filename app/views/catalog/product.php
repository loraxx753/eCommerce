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
				<div>
					<i class="icon-star"></i>
					<i class="icon-star"></i>
					<i class="icon-star"></i>
					<i class="icon-star-empty"></i>
					<i class="icon-star-empty"></i>
				</div>
			</div>
			<div class="span6 product_description">
				<p><?=$product->Product_Description?></p>
			</div>
			<div class="span6 product_options pull-right">
				<p class="span1 quantity">Quantity:</p>
				<input type="text" class="span1" value="1" />
				<div class="span2 pull-right"><h3>$<?=number_format($product->Product_Price, 2)?></h3></div>
			</div>
			<div class="span3 pull-right add_to_cart">
				<a href="<?=WEB_BASE?>catalog/cart/2/2" class="btn btn-small">Add To Cart</a>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<div class="row">
					<div class="span12 featured">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">Product Specifications</a></li>
								<li><a href="#tab2" data-toggle="tab">Product Reviews</a></li>
								<li><a href="#tab3" data-toggle="tab">Policies</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab1">
									<p>Lorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque. In eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in in lorem vel. In molestie elit dui dictum, praesent nascetur pulvinar sed, in dolor pede in aliquam, risus nec error quis pharetra. Eros metus quam augue suspendisse, metus rutrum risus erat in.</p>
								</div>
								<div class="tab-pane" id="tab2">
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
								</div>
								<div class="tab-pane" id="tab3">
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<h3>Other Recommended Items</h3>
				<div class="span12">
						<div class="span2 featured_catalog_item">
							<ul class="thumbnail">
								<li><?=Load::image("/products/chair2_thumbnail.jpg", "Napoleon Chair")?></li>
								<li><a href="product">Napoleon Chair</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 featured_catalog_item">
							<ul class="thumbnail">
								<li><?=Load::image("/products/desk2_thumbnail.jpg", "Writing Desk")?></li>
								<li><a href="product">Writing Desk</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span2 featured_catalog_item">
							<ul class="thumbnail">
								<li><?=Load::image("/products/chair3_thumbnail.jpg", "Wooden Chair")?></li>
								<li><a href="product">Wooden Chair</a></li>
								<li>$100.00</li>
							</ul>
						</div>
						<div class="span3 offset8">
							<a href="#" class="btn btn-small recommended_button">More Recommended Items</a>
						</div>	
					</div>
			</div>
		</div>
