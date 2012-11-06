<?php
	class Client_Controller {
		public static function action_index()
		{
			$render = new Render();
			$render->addVar('title', "NWA Furniture | Client Dashboard");

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
			$user = Model_Users::build()->where('username', Session::get('username'))->execute();

			if(isset($user->access))
			{
				if($user->access == $level)
				{
					return true;
				}
				else
				{
					header('HTTP/1.1 403 Forbidden');
				}

			}
			else
			{
				header('HTTP/1.1 403 Forbidden');
				die();
			}

		}
	}