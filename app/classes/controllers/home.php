<?php

class Home_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "Home");

		$render->load('home', 'index');
	}
}