		<div class="row">
			<div id="featured_slider" class="span12">
				<?=Load::image("slider.jpg", "Furniture Sale!")?>
			</div>
		</div>
		<div id="main_content" class="row">
			<div class="span8">
				<div class="row">
					<div class="span12 featured">
						<span class="span12">Featured Items</span>
						<?php
							for($x=0; $x<4; $x++)
							{?>
								<div class="span2 catalog_item">
								<ul class="thumbnail">
								<li><?=Load::image($featured[$x]->Product_Image.'_thumbnail.jpg', $featured[$x]->Product_Name)?></li>
								<li><?=Load::link(array('product/'.$featured[$x]->ProductID => $featured[$x]->Product_Name))?></li>
								<li>$<?=number_format($featured[$x]->Product_Price, 2)?></li>
								</ul>
								</div>
							<?php }?>					
					</div>
					<div class="span12 featured">
						<span class="span12">Top Sellers</span>
						<?php
							for($x=0; $x<4; $x++)
							{
								echo '<div class="span2 catalog_item">';
								echo '<ul class="thumbnail">';
								echo '<li>'.Load::image($top[$x]->Product_Image.'_thumbnail.jpg', $top[$x]->Product_Name).'</li>';
								echo '<li>'.Load::link(array('product/'.$top[$x]->ProductID => $top[$x]->Product_Name)).'</li>';
								echo '<li>$'.number_format($top[$x]->Product_Price, 2).'</li>';
								echo '</ul>';
								echo '</div>';
							} 
						?>
					</div>
					<div class="span12 featured">
						<span class="span12">Recently Added Items</span>
						<?php
							for($x=0; $x<4; $x++)
							{
								echo '<div class="span2 catalog_item">';
								echo '<ul class="thumbnail">';
								echo '<li>'.Load::image($new[$x]->Product_Image.'_thumbnail.jpg', $new[$x]->Product_Name).'</li>';
								echo '<li>'.Load::link(array('product/'.$new[$x]->ProductID => $new[$x]->Product_Name)).'</li>';
								echo '<li>$'.number_format($new[$x]->Product_Price, 2).'</li>';
								echo '</ul>';
								echo '</div>';
							} 
						?>	
					</div>
				</div>
			</div>
		</div>
