<?php

class Catalog_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "Catalog");

		$items = Model_Products::build()->execute();

		$render->load('catalog', 'index');
	}	
	public static function action_product()
	{
		$render = new Render();
		$render->addVar('title', "Catalog");
		$render->load('catalog', 'product');		
	}
	public static function action_cart($item, $quantity)
	{
		$render = new Render();

		$cart = Shopper::load();
		for($x=0; $x<$quantity; $x++)
		{
			$cart->add_item($item);
		}
		
		$render->load('catalog', 'product');
	}
}