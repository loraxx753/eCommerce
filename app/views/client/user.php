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
						<h3 id="manage_header">Manage Users</h3>
						<small>Change access for currently registered users!</small>
						<hr />
							<?php foreach($users as $user) {?>
							<div class="row">
								<div class="span2">
									<p><?=$user->user?></p>
								</div>
								<div class="span2">
									<p><?=$user->email?></p>
								</div>
								<div class="span1">
									<p><?=ucwords($access[$user->access])?></p>
								</div>
								<div class="span3">
									<p><a class="btn chage_access" href="<?=LINK_BASE?>client/demote/<?=$user->id?>">Demote</a> <a class="btn chage_access" href="<?=LINK_BASE?>client/promote/<?=$user->id?>">Promote</a> </p>
								</div>
							</div>
							<hr />
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
		
