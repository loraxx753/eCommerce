<?php
	class Client_Controller {
		public static function action_index()
		{
			self::authenticate('customer');
			$render = new Render();
			$render->addVar('title', "NWA Furniture | Client Dashboard");
			$render->addVar('access', Auth::check_access());
			
			$render->addVar('name',Session::get('username'));
			$user = Model_Users::build()->where('user', Session::get('username'))->execute();
			$render->addVar('email', $user[0]->email);
			
			$render->load('client', 'profile');
		}
		public static function action_manage()
		{
			self::authenticate('admin');
			$render = new Render();
			$render->addVar('title', "NWA Furniture | Administrator Dashboard");
			$render->addVar('access', Auth::check_access());
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