<?php

class Home_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Home");

		$featured = \Model_Products::build();
		$featured = $featured->or_where('Featured', 1);
		$featured = $featured->execute();
		$render->addVar('featured', $featured);

		$top = \Model_Products::build();
		$top = $top->order_by('Total_Sold DESC');
		$top = $top->execute();
		$render->addVar('top', $top);

		$new = \Model_Products::build();
		$new = $new->order_by('ProductID DESC');
		$new = $new->execute();
		$render->addVar('new', $new);

		$render->load('home', 'index');
	}
}