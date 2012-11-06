		<div class="row">
			<div class="span3">
				<div class="row">
					<aside id="sidebar" class="span3">
						<span>Item Categories</span>
							<ul>
								<?= '<li>'.Load::link(array('catalog/catagories/1' => "Chairs")).'</li>';?>
								<?= '<li>'.Load::link(array('catalog/catagories/2' => "Couches")).'</li>';?>
								<?= '<li>'.Load::link(array('catalog/catagories/3' => "Desks")).'</li>';?>
							</ul>
						<span>Narrow Results</span>
						<p>Price</p>
							<ul>
								<li><a href="">$0-$100</a></li>
								<li><a href="#">$100-$200</a></li>
								<li><a href="#">$200-$300</a></li>
								<li><a href="#">$300-$400</a></li>
								<li><a href="#">$400+</a></li>
							</ul>
						<p>Material</p>
							<ul>
								<li><a href="#">Cotton</a></li>
								<li><a href="#">Leather</a></li>
								<li><a href="#">Wool</a></li>
								<li><a href="#">Polyester</a></li>
							</ul>
						<p>Weight</p>
							<ul>
								<li><a href="#">0<small>lbs</small>-50<small>lbs</small></a></li>
								<li><a href="#">50<small>lbs</small>-100<small>lbs</small></a></li>
								<li><a href="#">100<small>lbs</small>-150<small>lbs</small></a></li>
								<li><a href="#">150<small>lbs</small>-200<small>lbs</small></a></li>
							</ul>
					</aside>
				</div>
			</div>
			<div class="span8">
				<div class="row">
					<div class="span9">
						<h2 class="catalog_header">Item Categories</h2>
						<hr />
						<div class="span2 catalog_item">
							<ul class="thumbnail">
								<li><?=Load::image("/products/chair2_thumbnail.jpg", "Chairs")?></li>
								<?= '<li>'.Load::link(array('catalog/catagories/1' => "Chairs")).'</li>';?>
							</ul>
						</div>
						<div class="span2 catalog_item">
							<ul class="thumbnail">
								<li><?=Load::image("/products/couch2_thumbnail.jpg", "Couches")?></li>
								<?= '<li>'.Load::link(array('catalog/catagories/2' => "Couches")).'</li>';?>
							</ul>
						</div>
						<div class="span2 catalog_item">
							<ul class="thumbnail">
								<li><?=Load::image("/products/desk2_thumbnail.jpg", "Desks")?></li>
								<?= '<li>'.Load::link(array('catalog/catagories/3' => "Desks")).'</li>';?>
							</ul>
						</div>		
					</div>
					<div class="span9">
						<h2 class="catalog_header">Merchandise</h2>
						<hr />
						<?php
							foreach ($items as $key => $value) 
							{
								
								echo '<div class="span2 catalog_item">';
								echo '<ul class="thumbnail">';
								echo '<li>'.Load::image($value->Product_Image."_thumbnail.jpg", "Chairs").'</li>';
								echo '<li><a href="product/'.$value->ProductID.'">'.$value->Product_Name.'</a></li>';
								echo '<li>'.number_format($value->Product_Price,2).'</li>';
								echo '</ul>';
								echo '</div>';
							}
						?>
					</div>
				</div>
			</div>
		</div>