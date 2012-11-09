		<div class="row">
			<div class="span4">
				<div class="row">
					<aside id="admin_sidebar" class="span4">
						<span>Admin Home</span>
							<ul>
								<li><a href="<?=LINK_BASE?>client/manage">Dashboard</a></li>
							</ul>
						<span>Product Management</span>
							<ul>
								<li><a href="<?=LINK_BASE?>client/product">Manage Products</a></li>
							</ul>
					</aside>
				</div>
			</div>
			<div class="span8">
				<div class="row">
					<div id="admin_dashboard" class="span8">
						<h3>Manage Products</h3>
						<small>Manage all of your store products!</small>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab2" data-toggle="tab">Products</a></li>
							<li><a href="#tab1" data-toggle="tab">Add Product</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane" id="tab1">
						<form id="contact" method="post" enctype="multipart/form-data" action="<?=LINK_BASE?>catalog/add_product">
                		<fieldset>
                           	<div class="span3">
                           		<label>Product Name:</label>
                           		<input type="text" name="Product_Name" placeholder="Enter product name here" />
                           	</div>
                        	<div class="span">
                            	<label>SKU:</label>
                           		<input type="text" name="SKU" class="span3" placeholder="Enter SKU here" />
                            </div>
                            <div class="span6">
                            	<label>Product Description:</label>
                           		<textarea></textarea>
                            </div>
                            <div class="span3">
                           		<label>Category:</label>
                           		<input type="text" name="Category_ID" placeholder="Enter Category ID here" />
                            </div>
                            <div class="span3">
                           		<label>Stock:</label>
                           		<input type="text" name="Stock" placeholder="Enter stock amount here" />
                           	</div>
                           	<div class="span3">
                           		<label>Cost:</label>
                           		<input type="text" name="Product_Cost" placeholder="Enter product cost here" />
                           	</div>
                           	<div class="span3">
                           		<label>Product Price:</label>
                           		<input type="text" name="Product_Price" placeholder="Enter product price here" />
                           	</div>
                           	<div class="span3">
                           		<label>Product Weight:</label>
                           		<input type="text" name="Weight" placeholder="Enter product weight here" />
                           	</div>
                           	<div class="span3">
                           		<label>Product Size:</label>
                           		<input type="text" name="Size" placeholder="Enter product size here" />
                           	</div>
                           	<div class="span3">
                           		<label>Image:</label>
                           		<input type="file" name="image" />
                       		</div>
                           	<div class="span3">
                           		<label>Thumbnail:</label>
                           		<input type="file" name="thumbnail" />
                           	</div>
                           	<div class="span3">
                           		<label>Featured Product:</label>
                           		<input type="checkbox" name="feat" value="true">
                           	</div>                           	
	                    </fieldset>
	                    <button type="submit" id="saveProducts" class="btn btn-small span2 pull-right offset-2">Save</button>
	                	</form>	
		                </div>
		                <div class="tab-pane active" id="tab2">
		                	<div class="span4 product_snapshot">
		                		<ul>
		                			<li class="product_image span2"><img src="http://localhost/4530c/assignment03/public/assets/img/products/couch1_thumbnail.jpg" /></li>
		                			<li class="product_name">Derp Product</li>
		                			<li class="product_sku">#1</li>
		                			<li><button type="button" class="btn btn-small">Edit</button><button type="button" class="btn btn-small">Delete</button></li>
		                		</ul>
		                	</div>
		                	<div class="span4 product_snapshot">
		                		<ul>
		                			<li class="product_image span2"><img src="http://localhost/4530c/assignment03/public/assets/img/products/couch1_thumbnail.jpg" /></li>
		                			<li class="product_name">Derp Product</li>
		                			<li class="product_sku">#1</li>
		                			<li><button type="button" class="btn btn-small">Edit</button><button type="button" class="btn btn-small">Delete</button></li>
		                		</ul>
		                	</div>
		                	<div class="span4 product_snapshot">
		                		<ul>
		                			<li class="product_image span2"><img src="http://localhost/4530c/assignment03/public/assets/img/products/couch1_thumbnail.jpg" /></li>
		                			<li class="product_name">Derp Product</li>
		                			<li class="product_sku">#1</li>
		                			<li><button type="button" class="btn btn-small">Edit</button><button type="button" class="btn btn-small">Delete</button></li>
		                		</ul>
		                	</div>
		                </div>
		                <div class="tab-pane" id="tab3">
		                	<h1>Delete Shit Goes Here</h1>
		                </div>
					</div>
				</div>
			</div>
		</div>
