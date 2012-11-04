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
		$count = 0; 

		//grabbing product information from the database
		foreach($cart -> cart as $key => $value)
		{
			$query = new Query("products");
			$query -> where("ProductID", "=", (string)$key);
			$cartArray[$key] = $query -> execute($query);
		}

		//create total price
		$total = $cart->subtotal();

		$render->addVar('total', $total);
		$render->addVar('cart', $cart->cart);
		$render->addVar('cartArray', $cartArray);
		$render->load('cart', 'index');
	}

	public static function action_update($newAmount, $itemID)
	{
		//load cart and grab the current number of an item
		$cart = Shopper::load();
		$currentAmount = $cart->quantity($itemID);

		
		//set new amount to the number of items to be added/removed
		//add or remove that number of specified items and render view
		if($newAmount > $currentAmount)
		{
			$newAmount = $newAmount - $currentAmount;
			for($x=0; $x<$newAmount; $x++)
			{
				$cart->add_item($itemID);
			}
		}
		else if($newAmount < $currentAmount)
		{
			$newAmount = $currentAmount - $newAmount;
			for($x=0; $x<$newAmount; $x++)
			{
				$cart->remove_item($itemID);
			}
		}

		$render = new Render();
		$render->addVar('title', "Cart");
		
		//create array of cart item information pulled from database
		$cartArray = array(); 
		$count = 0; 

		foreach($cart -> cart as $key => $value)
		{
			$query = new Query("products");
			$query -> where("ProductID", "=", (string)$key);
			$cartArray[$key] = $query -> execute($query);
			$cartArray[$key][0]->Quantity = $cart->cart[$key];
		}

		//create total price
		$total = $cart->subtotal();

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