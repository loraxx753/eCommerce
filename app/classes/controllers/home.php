<?php

class Home_Controller extends Controller
{
	public function action_index()
	{
		$render = new Render();
		$render->addVar('title', "Home");
		$render->addVar('featured', Model_Products::find("Featured=1"));

		$render->load('home', 'index');
	}
}