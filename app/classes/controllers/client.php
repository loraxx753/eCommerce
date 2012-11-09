<?php
	class Client_Controller {
		public static function action_index()
		{
			self::authenticate('customer');
			$render = new Render();
			$render->addVar('title', "NWA Furniture | Client Dashboard");
			$user = Model_Users::build()->where('user', Session::get('username'))->execute();
			$render->addVar('user', $user[0]);

			$render->load('client', 'profile');

		}
		public static function action_admin()
		{
			self::authenticate('admin');
			$render = new Render();
			$render->addVar('title', "NWA Furniture | Administrator Dashboard");

			$render->load('client', 'admin');

		}
		public static function authenticate($level)
		{	
			if(!Auth::check_access($level))
			{
				header('Location: '.WEB_BASE);
				die();
			}
		}
	}