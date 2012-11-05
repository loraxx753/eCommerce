<?php

class Catalog_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		$items = Model_Products::build()->execute();
		$render->addVar('items', $items);

		$render->load('catalog', 'index');
	}	
	public static function action_product($id)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Product");

		$products = \Model_Products::build();
		$products->or_where("ProductID", $id);
		$product = $products->execute();
		$render->addVar('product', $product[0]);

		$render->load('catalog', 'product');		
	}
	public static function action_cart($item, $quantity)
	{
		$cart = Shopper::load();
		for($x=0; $x<$quantity; $x++)
		{
			$cart->add_item($item);
		}
	}
}