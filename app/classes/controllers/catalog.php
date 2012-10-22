<?php

class Catalog_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "Catalog");

		$items = Model_Products::build()->execute();

		var_dump($items);
		die();
		$render->load('catalog', 'index');
	}
	public function action_product()
	{
		$render = new Render();
		$render->addVar('title', "Catalog");

		$render->load('catalog', 'product');		
	}
}