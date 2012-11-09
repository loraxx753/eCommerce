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
								<?php if(Auth::check_access('admin')) { ?>
								<li><a href="<?=LINK_BASE?>client/user">Manage Users</a></li>
								<?php } ?>
							</ul>
					</aside>
				</div>
			</div>
			<div class="span8">
				<div class="row">
					<div id="admin_dashboard" class="span8">
							<h3>Administrator Dashboard</h3>
							<small>A summary of all recent activity on your account.</small>
					</div>
				</div>
			</div>
		</div>
