<?php

class Cart_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Cart");
		
		//create array of cart item information pulled from database
		$cart = Shopper::load();
		$cartArray = array(); 
		$count = 0; 

		//grabbing product information from the database
		foreach($cart -> cart as $key => $value)
		{
			$products = \Model_Products::build();
			$products = $products -> or_where("ProductID", $key);
			$products = $products -> execute();

			$cartArray[$key] = $products;
		}

		//create total price
		$total = $cart->subtotal();

		$render->addVar('total', $total);
		$render->addVar('cart', $cart->cart);
		$render->addVar('jcart', $_SESSION['jcart']);
		$render->addVar('cartArray', $cartArray);
		$render->load('cart', 'index');
	}
	public static function action_total()
	{
		$cart = Shopper::load();
		echo $cart->subtotal();
	}

	public static function action_update($itemID, $newAmount)
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
		$render->addVar('title', "NWA Furniture | Shopping Cart");
		
		//create array of cart item information pulled from database
		$cartArray = array(); 
		$count = 0; 

		foreach($cart -> cart as $key => $value)
		{
			$products = \Model_Products::build();
			$products = $products -> or_where("ProductID", $key);
			$products = $products -> execute();

			$cartArray[$key] = $products;
		}

		//create total price
		$total = $cart->subtotal();

		$render->addVar('total', $total);
		$render->addVar('cart', $cart->cart);
		$render->addVar('cartArray', $cartArray);
		$render->load('cart', 'index');
	}

	public static function action_delete($itemID)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Shopping Cart");

		//create array of cart item information pulled from database
		$cart = Shopper::load();
		$cart->remove_type($itemID);
		$cartArray = array(); 
		$count = 0; 

		//grabbing product information from the database
		foreach($cart -> cart as $key => $value)
		{
			$products = \Model_Products::build();
			$products = $products -> or_where("ProductID", $key);
			$products = $products -> execute();

			$cartArray[$key] = $products;
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
		$render->addVar('title', "NWA Furniture | Checkout");

		//create array of cart item information pulled from database
		$cart = Shopper::load();
		$cartArray = array(); 
		$count = 0; 

		//grabbing product information from the database
		foreach($cart -> cart as $key => $value)
		{
			$products = \Model_Products::build();
			$products = $products -> or_where("ProductID", $key);
			$products = $products -> execute();

			$cartArray[$key] = $products;
		}

		//create total price
		$total = $cart->subtotal();

		$render->addVar('total', $total);
		$render->addVar('cart', $cart->cart);
		$render->addVar('cartArray', $cartArray);
		$render->addVar('jcart', $_SESSION['jcart']);

		$shipping = 15;
		$render->addVar('shipping', $shipping);

		$tax = ($cart->subtotal() + 15) *  0.065;
		$render->addVar('tax', $tax);

		$render->load('cart', 'checkout');
	}
}