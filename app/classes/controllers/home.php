<?php

class Home_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "Home");

		$products = \Model_Products::build();

		$featured = $products->or_where('Featured', 1);
		$featured = $featured->execute();
		$render->addVar('featured', $featured);

		$render->load('home', 'index');
	}
}