<?php
	class Client_Controller {
		public function action_index()
		{
			$render = new Render();
			$render->addVar('title', "Profile");

			$render->load('client', 'profile');

		}
		public function action_admin()
		{
			$render = new Render();
			$render->addVar('title', "Admin");

			$render->load('client', 'admin');

		}
	}