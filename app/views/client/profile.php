		<div class="row">
			<div class="span4">
				<div class="row">
					<div id="client_sidebar" class="span4">
						<span>Account Home</span>
						<ul>
							<?='<li>'.Load::link(array('client' => "Dashboard")).'</li>';?>
						</ul>
					</div>
				</div>
			</div>
			<div class="span8">
				<div class="row">
					<div id="dashboard" class="span8">
							<h3>Dashboard</h3>
							<small>A summary of all recent activity on your account.</small>
						<div id="account_info" class="span8">
							<h5>Account Info</h5>
							<hr />
							<span class="span8">Email Address:</span>
							<p class="span4"><?=$email?></p>
							<span class="span8">Account Username:</span>
							<p class="span4"><?=$name?></p>
						</div>	
					</div>
				</div>
			</div>
		</div>
