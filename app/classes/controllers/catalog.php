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
	public static function action_catagories($catagory)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		$items = Model_Products::build();
		$items = $items->or_where("Category_ID", $catagory);
		$items = $items->execute();

		$render->addVar('items', $items);

		$render->load('catalog', 'index');
	}
	public static function action_price($limit_min, $limit_max = -1)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		$items = Model_Products::build();
		$items = $items->execute();

		$range = array();

		foreach ($items as $key => $value) 
		{
			if($value->Product_Price >= $limit_min && $value->Product_Price <= $limit_max && $limit_max != -1)
			{
				$range[$key] = $value;
			}

			if($limit_max == -1 && $value->Product_Price >= $limit_min)
			{
				$range[$key] = $value;
			}
		}

		$render->addVar('items', $range);
		$render->load('catalog', 'index');	
	}
	public static function action_material()
	{
		
	}
	public static function action_weight($limit_min, $limit_max)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		$items = Model_Products::build();
		$items = $items->execute();

		$range = array();

		foreach ($items as $key => $value) 
		{
			if($value->Product_Weight >= $limit_min && $value->Product_Weight <= $limit_max && $limit_max != -1)
			{
				$range[$key] = $value;
			}
		}

		$render->addVar('items', $range);
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