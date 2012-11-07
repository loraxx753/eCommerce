<?php

class About_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | About");

		$render->load('about', 'index');

	}
	public static function action_policies()
	{
		$render = new Render();
		$render->addVar('title', "Policies");

		$render->load('about', 'policies');

	}
}