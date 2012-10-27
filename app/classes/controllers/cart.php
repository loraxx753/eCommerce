<?php

class Cart_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "Cart");
		
		//create array of cart item information pulled from database
		$cart = Shopper::load();
		$cartArray = array(); 
		foreach($cart -> cart as $key => $value)
		{
			$query = new Query("products");
			$query -> where("ProductID", "=", (string)$key);
			$cartArray[$key] = $query -> execute($query);
		}

		//create total price
		$total = 0; 
		foreach ($cartArray as $key => $products) 
		{
			foreach ($products as $key => $product) 
			{
				$total += $product->Product_Price;
			}
		}

		$render->addVar('total', $total);
		$render->addVar('cart', $cart->cart);
		$render->addVar('cartArray', $cartArray);
		$render->load('cart', 'index');
	}
	public static function action_checkout()
	{
		$render = new Render();
		$render->addVar('title', "Ceckout");
		$render->load('cart', 'checkout');
	}
}