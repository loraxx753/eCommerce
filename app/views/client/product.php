		<div class="row">
			<div class="span4">
				<div class="row">
					<aside id="admin_sidebar" class="span4">
						<span>Admin Home</span>
							<ul>
								<li><a href="<?=LINK_BASE?>client/manage">Dashboard</a></li>
							</ul>
						<span>User Management</span>
							<ul>
								<li><a href="<?=LINK_BASE?>client/user">Manage Users</a></li>
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
						<div id="order_info" class="span8">
							<form id="contact" method="post" action="#">
                	<fieldset>
                    	<legend><h3>Catalog Portal</h3></legend>
                            <label>Product ID:</label>
                            	<input type="text" size="30" name="ProductID" placeholder="Enter product ID here" />
                           <label>SKU:</label>
                           	<input type="text" size="30" name="SKU" placeholder="Enter SKU here" />
                           <label>Product Description:</label>
                           	<textarea rows="20" cols="50"></textarea>
                           	<label>Category ID:</label>
                           	<input type="text" size="30" name="Category_ID" placeholder="Enter Category ID here" />
                           	<label>Stock:</label>
                           	<input type="text" size="30" name="Stock" placeholder="Enter stock amount here" />
                           	<label>Cost:</label>
                           	<input type="text" size="30" name="Product_Cost" placeholder="Enter product cost here" />
                           	<label>Product Price:</label>
                           	<input type="text" size="30" name="Product_Price" placeholder="Enter product price here" />
                           	<label>Product Image:</label>
                           	<input type="text" size="30" name="Product_Image" placeholder="Enter image url here" />
                           	<label>Product Weight:</label>
                           	<input type="text" size="30" name="Weight" placeholder="Enter product weight here" />
                           	<label>Product Size:</label>
                           	<input type="text" size="30" name="Size" placeholder="Enter product size here" />
                           	<label>Product Name:</label>
                           	<input type="text" size="30" name="Product_Name" placeholder="Enter product name here" />
                           	<label>Featured Product:</label>
                           	<input type="checkbox" name="feat" value="true">
                           	<label>Image:</label>
                           	<input type="file" name="image" />
                           	<label>Thumbnail:</label>
                           	<input type="file" name="thumbnail" />
                    </fieldset>
                </form>
						</div>	
					</div>
				</div>
			</div>
		</div>
