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
		public static function action_user()
		{
			self::authenticate('privilege');
			$render = new Render();
			$render->addVar('title', "NWA Furniture | User Management");
			$render->addVar('access', Auth::check_access());
			
			$render->addVar('name',Session::get('username'));
			$user = Model_Users::build()->where('user', Session::get('username'))->execute();
			$render->addVar('email', $user[0]->email);
			
			$render->load('client', 'user');

		}
		public static function action_product()
		{
			self::authenticate('privilege');
			$render = new Render();
			$render->addVar('title', "NWA Furniture | Product Management");
			$render->addVar('access', Auth::check_access());
			
			$render->addVar('name',Session::get('username'));
			$render->addVar('products', Model_Products::build()->execute());
			$render->addVar('categories', Model_Catagories::build()->execute());
			$user = Model_Users::build()->where('user', Session::get('username'))->execute();
			$render->addVar('email', $user[0]->email);
			
			$items = Model_Products::build()->execute();
			$render->addVar('items', $items);

			$render->load('client', 'product');

		}		
		public static function action_manage()
		{
			self::authenticate('privilege');
			$render = new Render();
			$render->addVar('title', "NWA Furniture | Administrator Dashboard");
			$render->addVar('access', Auth::check_access());

			$render->load('client', 'admin');

		}
		public static function authenticate($level)
		{	
			if(!Auth::check_access($level))
			{
				header('Location: '.HOME_LINK_BASE);
				die();
			}
		}
	}