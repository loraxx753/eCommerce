		<div class="row">
			<div id="featured_slider" class="span12">
				<?=Load::image("slider.jpg", "Furniture Sale!")?>
			</div>
		</div>
		<div id="main_content" class="row">
			<div class="span8">
				<div class="row">
					<div class="span12 featured">
						<?php
							for($x=0; $x<4; $x++)
							{
								echo '<div class="span2 catalog_item">';
								echo '<ul class="thumbnail">';
								echo '<li>'.Load::image($featured[$x]->Product_Image, $featured[$x]->Product_Name).'</li>';
								echo '<li>'.Load::link(array('product/'.$featured[$x]->ProductID => $featured[$x]->Product_Name)).'</li>';
								echo '<li>$'.number_format($featured[$x]->Product_Price, 2).'</li>';
								echo '</ul>';
								echo '</div>';
							}
						?>
						<div class="span2 offset9">
							<button class="btn btn-small featured_button">More Featured Items</button>
						</div>						
					</div>
					<div class="span12 featured">
						<?php
							for($x=0; $x<4; $x++)
							{
								echo '<div class="span2 catalog_item">';
								echo '<ul class="thumbnail">';
								echo '<li>'.Load::image($top[$x]->Product_Image, $top[$x]->Product_Name).'</li>';
								echo '<li>'.Load::link(array('product/'.$top[$x]->ProductID => $top[$x]->Product_Name)).'</li>';
								echo '<li>$'.number_format($top[$x]->Product_Price, 2).'</li>';
								echo '</ul>';
								echo '</div>';
							} 
						?>
						<div class="span2 offset9">
							<button class="btn btn-small featured_button">More Top Sellers</button>
						</div>	
					</div>
					<div class="span12 featured">
						<?php
							for($x=0; $x<4; $x++)
							{
								echo '<div class="span2 catalog_item">';
								echo '<ul class="thumbnail">';
								echo '<li>'.Load::image($new[$x]->Product_Image, $new[$x]->Product_Name).'</li>';
								echo '<li>'.Load::link(array('product/'.$new[$x]->ProductID => $new[$x]->Product_Name)).'</li>';
								echo '<li>$'.number_format($new[$x]->Product_Price, 2).'</li>';
								echo '</ul>';
								echo '</div>';
							} 
						?>
						<div class="span2 offset9">
							<button class="btn btn-small featured_button">More Newly Added</button>
						</div>	
					</div>
				</div>
			</div>
		</div>
